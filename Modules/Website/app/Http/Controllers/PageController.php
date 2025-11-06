<?php

declare(strict_types=1);

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Website\Http\Resources\PageResource;
use Modules\Website\Models\Page;

final class PageController extends Controller
{
    /**
     * Display a listing of pages.
     *
     * @group Pages
     * @authenticated false
     *
     * Retrieves a list of published pages with optional filtering and search capabilities.
     * 
     * @queryParam type string Filter pages by type (e.g. 'home', 'about', 'contact'). Example: about
     * @queryParam q string Search in title, slug and content. Example: services
     * @queryParam include_hierarchy boolean Include parent and children relationships. Example: true
     * @queryParam per_page integer Number of items per page. Default: 15
     *
     * @response scenario=success {
     *  "data": [
     *    {
     *      "id": 1,
     *      "title": "About Us",
     *      "slug": "about",
     *      "type": "page",
     *      "blocks": [
     *        {
     *          "type": "hero",
     *          "title": "Our Story",
     *          "content": "Learn about our journey..."
     *        }
     *      ],
     *      "meta": {
     *        "description": "About our company",
     *        "keywords": "about,company,history"
     *      }
     *    }
     *  ],
     *  "meta": {
     *    "current_page": 1,
     *    "total": 10,
     *    "per_page": 15
     *  }
     * }
     */
    public function index(Request $request)
    {
        $query = Page::query()->where('status', 'published');

        // Filter by type (home, about, contact, custom, etc.)
        if ($request->filled('type')) {
            $query->where('type', $request->query('type'));
        }

        // Search in title, slug, or content
        if ($q = $request->query('q')) {
            $query->where(function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                    ->orWhere('slug', 'like', "%{$q}%")
                    ->orWhere('content', 'like', "%{$q}%");
            });
        }

        // Include parent/children relationships if requested
        if ($request->boolean('include_hierarchy')) {
            $query->with(['parent', 'children']);
        }

        $perPage = (int) $request->query('per_page', 15);
        $pages = $query->orderBy('title')->paginate($perPage);

        return PageResource::collection($pages);
    }

    /**
     * Show a single page by slug or ID.
     *
     * @group Pages
     * @authenticated false
     *
     * Retrieves a specific page by its slug or ID. Only published pages are returned.
     * 
     * @urlParam identifier string required The page identifier - can be either a slug (e.g. 'about-us') or numeric ID. Example: about-us
     * @queryParam include_hierarchy boolean Include parent and children relationships. Example: true
     * 
     * @response scenario=success {
     *   "data": {
     *     "id": 1,
     *     "title": "About Us",
     *     "slug": "about-us",
     *     "type": "page",
     *     "status": "published",
     *     "blocks": [
     *       {
     *         "type": "hero",
     *         "title": "Our Story",
     *         "content": "Learn about our journey..."
     *       },
     *       {
     *         "type": "contact-form",
     *         "title": "Get in Touch",
     *         "form_slug": "contact",
     *         "submit_url": "/api/v1/pages/contact/submit"
     *       }
     *     ],
     *     "meta": {
     *       "description": "About our company and mission",
     *       "keywords": "about,company,history"
     *     },
     *     "created_at": "2023-01-01T00:00:00Z",
     *     "updated_at": "2023-01-01T00:00:00Z"
     *   }
     * }
     * @response status=404 {
     *   "message": "Page not found"
     * }
     */
    public function show(Request $request, string $identifier)
    {
        // Try to find by slug first, then by ID
        $page = Page::query()
            ->where('status', 'published')
            ->where(function ($query) use ($identifier) {
                $query->where('slug', $identifier)
                    ->orWhere('id', $identifier);
            })
            ->firstOrFail();

        // Load relationships if requested
        if ($request->boolean('include_hierarchy')) {
            $page->load(['parent', 'children']);
        }

        return new PageResource($page);
    }

    /**
     * Get page by type (e.g., 'home', 'about', 'contact').
     * This is a convenience endpoint for frontend to fetch specific page types.
     */
    public function byType(Request $request, string $type)
    {
        $page = Page::query()
            ->where('status', 'published')
            ->where('type', $type)
            ->firstOrFail();

        if ($request->boolean('include_hierarchy')) {
            $page->load(['parent', 'children']);
        }

        return new PageResource($page);
    }
}
