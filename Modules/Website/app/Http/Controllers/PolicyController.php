<?php

declare(strict_types=1);

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Website\Models\Policy;
use Modules\Website\Http\Resources\PolicyResource;

/**
 * @group Policies
 * 
 * APIs for managing public policies. Retrieve all policies or a specific policy by slug.
 * 
 * Policies are typically legal documents like terms of service or privacy policy.
 */
class PolicyController extends Controller
{
    /**
     * List all policies
     *
     * Retrieve a list of all published and draft policies.
     * Results are sorted by most recently updated first.
     *
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "title": "Privacy Policy",
     *       "slug": "privacy-policy",
     *       "status": "published",
     *       "content": "# Privacy Policy\n\nYour privacy is important to us...",
     *       "meta_title": "Privacy Policy",
     *       "meta_description": "Read our privacy policy",
     *       "created_at": "2025-11-10T10:30:00Z",
     *       "updated_at": "2025-11-11T15:45:00Z"
     *     }
     *   ]
     * }
     */
    public function index(Request $request): ResourceCollection
    {
        $policies = Policy::query()->latest('updated_at')->get();
        return PolicyResource::collection($policies);
    }

    /**
     * Get a policy by slug
     *
     * Retrieve a single policy using its URL-friendly slug.
     *
     * @urlParam policy string required The policy slug (e.g., "privacy-policy"). Example: privacy-policy
     *
     * @response 200 {
     *   "data": {
     *     "id": 1,
     *     "title": "Privacy Policy",
     *     "slug": "privacy-policy",
     *     "status": "published",
     *     "content": "# Privacy Policy\n\nYour privacy is important to us...",
     *     "meta_title": "Privacy Policy",
     *     "meta_description": "Read our privacy policy",
     *     "created_at": "2025-11-10T10:30:00Z",
     *     "updated_at": "2025-11-11T15:45:00Z"
     *   }
     * }
     *
     * @response 404 {
     *   "message": "Not found"
     * }
     */
    public function show(Policy $policy): PolicyResource
    {
        return new PolicyResource($policy);
    }
}

