<?php

declare(strict_types=1);

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Website\Models\Faq;
use Modules\Website\Http\Resources\FaqResource;

/**
 * @group FAQs
 * 
 * APIs for managing frequently asked questions. Retrieve all FAQs or a specific FAQ by ID.
 * 
 * FAQs help users find answers to common questions about products and services.
 */
class FaqController extends Controller
{
    /**
     * List all FAQs
     *
     * Retrieve a list of all FAQs sorted by most recently updated first.
     *
     * @response 200 {
     *   "data": [
     *     {
     *       "id": 1,
     *       "question": "What is your return policy?",
     *       "answer": "We offer 30-day returns on all products...",
     *       "status": "published",
     *       "created_at": "2025-11-10T10:30:00Z",
     *       "updated_at": "2025-11-11T15:45:00Z"
     *     }
     *   ]
     * }
     */
    public function index(Request $request): ResourceCollection
    {
        $faqs = Faq::query()->latest('updated_at')->get();
        return FaqResource::collection($faqs);
    }

    /**
     * Get a specific FAQ
     *
     * Retrieve a single FAQ by its ID.
     *
     * @urlParam faq integer required The FAQ ID. Example: 1
     *
     * @response 200 {
     *   "data": {
     *     "id": 1,
     *     "question": "What is your return policy?",
     *     "answer": "We offer 30-day returns on all products...",
     *     "status": "published",
     *     "created_at": "2025-11-10T10:30:00Z",
     *     "updated_at": "2025-11-11T15:45:00Z"
     *   }
     * }
     *
     * @response 404 {
     *   "message": "Not found"
     * }
     */
    public function show(Faq $faq): FaqResource
    {
        return new FaqResource($faq);
    }
}

