<?php

declare(strict_types=1);

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Website\Models\Form;

final class FormController extends Controller
{
    /**
     * List available forms with their fields and settings.
     *
     * @group Forms
     * @authenticated false
     * 
     * Returns a list of all available forms along with their complete field definitions
     * and configuration settings.
     *
     * @queryParam include_submissions boolean Include submission count in response. Example: true
     * @queryParam active boolean Filter by active/inactive forms. Example: true
     *
     * @response scenario=success {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Demo Request",
     *       "slug": "demo-request",
     *       "description": "Request a demo of the product",
     *       "active": true,
     *       "fields": [
     *         {
     *           "name": "name",
     *           "type": "string",
     *           "label": "Full Name",
     *           "placeholder": "John Doe",
     *           "validation": ["required", "max:255"]
     *         },
     *         {
     *           "name": "email",
     *           "type": "email",
     *           "label": "Email Address",
     *           "validation": ["required", "email"]
     *         }
     *       ],
     *       "settings": {
     *         "success_message": "Thanks for your interest!",
     *         "notification_email": "sales@example.com"
     *       }
     *     }
     *   ]
     * }
     */
    public function index(Request $request)
    {
        $forms = Form::query()
            ->select(['id', 'name', 'slug', 'description', 'fields', 'settings', 'status'])
            ->get();

        return response()->json([ 'data' => $forms ], 200);
    }

    /**
     * Get a single form by slug or id. Useful for frontend to render dynamic forms.
     *
     * @group Forms
     * @urlParam identifier string required The form slug (e.g. `demo-request`) or id.
     * @response 200 {
     *  "data": {
     *    "id": 1,
     *    "name": "Demo Request",
     *    "slug": "demo-request",
     *    "fields": [
     *      {"name":"name","type":"string","label":"Name","validation":["required"]}
     *    ]
     *  }
     * }
     */
    public function show(Request $request, string $identifier)
    {
        $form = Form::where('slug', $identifier)
            ->orWhere('id', is_numeric($identifier) ? (int) $identifier : 0)
            ->first();

        if (! $form) {
            return response()->json(['message' => 'Form not found.'], 404);
        }

        return response()->json([ 'data' => $form ], 200);
    }
}
