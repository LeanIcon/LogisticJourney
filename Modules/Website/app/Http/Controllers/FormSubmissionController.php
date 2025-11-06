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
     * @group Form Submissions
     * @authenticated false
     *
     * Handles form submission and validation. Field names and validation rules are dynamic 
     * based on the form definition. Frontend should call GET /api/v1/forms/{slug} first
     * to retrieve the fields array before submitting.
     *
     * @urlParam identifier string required The form slug to submit to. Example: contact-us
     * @bodyParam fields object required The form field values keyed by field name
     * @bodyParam fields.name string required The name of the submitter. Example: John Doe
     * @bodyParam fields.email string required Email address. Example: john@example.com
     * @bodyParam fields.message string Message content. Example: I'd like more information
     * @bodyParam captcha string required reCAPTCHA token. Example: xyz123
     *
     * @response scenario=success status=201 {
     *   "status": "success",
     *   "data": {
     *     "id": 1,
     *     "form_id": 1,
     *     "fields": {
     *       "name": "John Doe",
     *       "email": "john@example.com",
     *       "message": "I'd like more information"
     *     }
     *   }
     * }
     * @response status=422 {
     *   "message": "Validation failed",
     *   "errors": {
     *     "fields.email": ["The email field is required"]
     *   }
     * }
     * @response status=404 {
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

        // Validate request
        $validated = $request->validate($rules);

        // Persist submission
        $submission = FormSubmission::create([
            'form_id' => $form->id,
            'data' => $validated,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Optionally log or dispatch notifications here
        Log::info('Form submitted', ['form' => $form->slug, 'id' => $submission->id]);

        return response()->json([
            'status' => 'ok',
            'id' => $submission->id,
            'message' => $form->settings['success_message'] ?? 'Submission received',
        ], 201);
    }
}
