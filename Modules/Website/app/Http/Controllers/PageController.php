<?php

declare(strict_types=1);

namespace Modules\Website\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Website\Http\Resources\PageResource;
use Modules\Website\Models\Page;

final class PageController extends Controller
{
    /**
     * Display a listing of pages.
     * Supports filtering by type (home, about, contact, etc.)
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
     * Supports slug-based routing for SEO-friendly URLs.
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
