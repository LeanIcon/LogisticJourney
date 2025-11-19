<?php

declare(strict_types=1);

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Website\Models\Form;
use Modules\Website\Models\FormSubmission;

final class FormSubmissionController extends Controller
{
    /**
     * Submit a form.
     *
     * This endpoint dynamically validates and stores a form submission
     * based on the form definition in the database.
     *
     * @group Form Submissions
     * @authenticated false
     *
     * @urlParam identifier string required The unique form slug identifier. Example: contact-us
     *
     * @bodyParam name string required The submitter's full name. Example: John Doe
     * @bodyParam email string required Valid email address. Example: john@example.com
     * @bodyParam phone string Optional phone number. Example: +233 24 123 4567
     * @bodyParam subject string Optional subject. Example: general inquiry
     * @bodyParam message string required Message body. Example: I’d like more details about your services.
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
     *   }
     * }
     *
     * @response status=404 scenario="form_not_found" {
     *   "message": "Form not found"
     * }
     */
    public function submit(Request $request, string $identifier)
    {
        // Try to find a form that matches the identifier
        $form = Form::where('slug', $identifier)->first();

        // Fallback to demo-request if not found
        if (! $form) {
            $form = Form::where('slug', 'demo-request')->firstOrFail();
        }

        $fields = $form->fields ?? [];

        // Build validation rules dynamically
        $rules = [];
        foreach ($fields as $field) {
            $name = $field['name'] ?? null;
            $validation = $field['validation'] ?? null;

            if ($name) {
                $rules[$name] = $validation ?: ['nullable'];
            }
        }

        // Validate request data
        $validated = $request->validate($rules);

        // Store submission
        $submission = FormSubmission::create([
            'form_id' => $form->id,
            'data' => $validated,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Log for debugging
        Log::info('Form submitted', [
            'form' => $form->slug,
            'id' => $submission->id,
        ]);

        // Return successful response
        return response()->json([
            'status' => 'ok',
            'id' => $submission->id,
            'message' => $form->settings['success_message'] ?? 'Submission received',
        ], 201);
    }
}
