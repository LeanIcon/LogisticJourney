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
     * Accept form submissions for a page.
     * Uses the form with slug matching the page identifier or falls back to 'demo-request'.
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
