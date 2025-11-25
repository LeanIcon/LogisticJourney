<?php

declare(strict_types=1);

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Website\Services\FormNotificationService;
use Modules\Website\Models\Form;
use Modules\Website\Models\FormSubmission;

final class FormSubmissionController extends Controller
{
    /**
     * @group Form Submission
     * Submit a form with Google reCAPTCHA verification.
     *
     * This endpoint allows the frontend to submit any form (contact, demo request, etc.) with dynamic fields and Google reCAPTCHA protection. The form is identified by its slug (e.g., `contact-us`).
     *
     * **Frontend Integration Notes:**
     * - Obtain a reCAPTCHA token from the frontend using your site key (`RECAPTCHA_SITE_KEY` from .env).
     * - Send the token in the `captcha` field of the request body.
     * - All required fields for the form will be validated dynamically based on backend configuration.
     * - On success, a confirmation email is sent to the user (if email is provided and valid).
     * - On failure, you will receive detailed validation errors or a captcha error.
     *
     * **Request:**
     * - Method: POST
     * - URL: `/api/forms/{identifier}/submit`
     * - Content-Type: `application/json`
     *
     * @urlParam identifier string required The form slug i
     *
     * @bodyParam name string required The submitter's full name. Example: John Doe
     * @bodyParam email string required Valid email address for contact and confirmation. Example: john@example.com
     * @bodyParam phone string Optional phone number. Example: +1 (555) 123-4567
     * @bodyParam subject string Optional subject or category. Example: general
     * @bodyParam message string required The message content. Example: I'd like more information about your services
     * @bodyParam captcha string required Google reCAPTCHA token (v2 or v3) from frontend widget. Example: 03AGdBq25hcBhpXPC...
     *
     *
     * @response scenario=success status=201 {
     *   "status": "ok",
     *   "id": 123,
     *   "message": "Submission received"
     * }
     *
     * @response status=422 scenario="validation_error" {
     *   "message": "Validation failed",
     *   "errors": {
     *     "email": ["The email field is required"],
     *     "name": ["The name field is required"],
     *     "message": ["The message field is required"]
     *   }dentifier. Example: contact-us
     * }
     *
     * @response status=422 scenario="captcha_failed" {
     *   "status": "error",
     *   "message": "reCAPTCHA verification failed."
     * }
     *
     * @response status=404 scenario="form_not_found" {
     *   "message": "Form not found"
     * }
     */
    public function submit(Request $request, string $identifier)
    {
        // Try to find a form that matches the identifier (slug)
        $form = Form::where('slug', $identifier)->first();

        // Fallback to demo-request form if none found
        if (! $form) {
            $form = Form::where('slug', 'demo-request')->firstOrFail();
        }

        $fields = $form->fields ?? [];

        // Build validation rules from form definition
        $rules = [];
        foreach ($fields as $field) {
            $name = $field['name'] ?? null;
            $validation = $field['validation'] ?? null;
            if ($name) {
                $rules[$name] = $validation ?: ['nullable'];
            }
        }

        // Validate request fields
        $validated = $request->validate($rules);

        // Get reCAPTCHA token from request
        $recaptchaToken = $request->input('captcha');
        
        // Verify reCAPTCHA token with Google's API
        $notificationService = new FormNotificationService();
        if (!$notificationService->verifyRecaptcha($recaptchaToken)) {
            // Get the last reCAPTCHA response from the log (or re-verify to get details)
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = [
                'secret' => $notificationService->getRecaptchaSecret(),
                'response' => $recaptchaToken
            ];
            $options = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data),
                ],
            ];
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $response = json_decode($result, true);
            return response()->json([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed.',
                'recaptcha_response' => $response
            ], 422);
        }

        // Persist submission to database
        $submission = FormSubmission::create([
            'form_id' => $form->id,
            'data' => $validated,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Save contact data locally (backup/logging)
        $contactData = [
            'form' => $form->slug,
            'fields' => json_encode($validated),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now()->toDateTimeString(),
        ];
        $notificationService->saveContactData($contactData);

        // Send formatted notification email to admin/team
        $subject = 'New Form Submission: ' . ucwords(str_replace('-', ' ', $form->slug));
        
        // Plain text fallback
        $plainBody = "Form: {$form->slug}\n" .
            "Fields: " . json_encode($validated, JSON_PRETTY_PRINT) . "\n" .
            "IP: " . $request->ip() . "\n" .
            "User Agent: " . $request->userAgent();
        
        // Metadata for the email template
        $metadata = [
            'form_name' => $form->name ?? ucwords(str_replace('-', ' ', $form->slug)),
            'form_slug' => $form->slug,
            'timestamp' => now()->format('M d, Y h:i A'),
        ];
        
        // Send the formatted HTML email
        $notificationService->sendNotification($subject, $plainBody, $validated, $metadata);

        // Send confirmation email to user if email field exists and is valid
        if (isset($validated['email']) && filter_var($validated['email'], FILTER_VALIDATE_EMAIL)) {
            $notificationService->sendConfirmationToUser($validated['email']);
        }

        // Log submission for debugging/auditing
        Log::info('Form submitted', ['form' => $form->slug, 'id' => $submission->id]);

        // Return success response
        return response()->json([
            'status' => 'ok',
            'id' => $submission->id,
            'message' => $form->settings['success_message'] ?? 'Submission received',
        ], 201);
    }
}