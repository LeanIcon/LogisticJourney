<?php

declare(strict_types=1);

namespace Modules\Blog\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Models\Category;

final class CategoryController extends Controller
{
    /**
     * List all blog categories.
     *
     * @group Blog Categories
     * @authenticated false
     *
     * Returns a list of all available blog categories.
     *
     * @response scenario=success {
     *   "data": [
     *     {
     *       "id": 1,
     *       "name": "Technology",
     *       "slug": "tech",
     *       "description": "Latest in technology and innovation",
     *       "post_count": 25,
     *       "featured_image": {
     *         "url": "https://example.com/images/tech.jpg",
     *         "alt": "Technology Category"
     *       }
     *     },
     *     {
     *       "id": 2,
     *       "name": "Business",
     *       "slug": "business",
     *       "description": "Business insights and trends",
     *       "post_count": 18,
     *       "featured_image": {
     *         "url": "https://example.com/images/business.jpg",
     *         "alt": "Business Category"
     *       }
     *     }
     *   ]
     * }
     */
    public function index()
    {
        $categories = Category::query()->orderBy('name')->get();

        return response()->json(['data' => $categories]);
    }

    /**
     * List posts in a category.
     *
     * @group Blog Categories
     * @authenticated false
     *
     * Returns a paginated list of published posts in a specific category.
     *
     * @urlParam category string required The category ID or slug. Example: tech
     * @queryParam q string Search in post titles. Example: cloud
     * @queryParam per_page integer Number of posts per page. Default: 15
     *
     * @response scenario=success {
     *   "data": [
     *     {
     *       "id": 1,
     *       "title": "Introduction to Cloud Computing",
     *       "slug": "intro-to-cloud-computing",
     *       "excerpt": "Learn the basics of cloud computing...",
     *       "type": "article",
     *       "featured_image": {
     *         "url": "https://example.com/images/cloud.jpg",
     *         "alt": "Cloud Computing"
     *       },
     *       "author": {
     *         "id": 1,
     *         "name": "John Doe"
     *       },
     *       "published_at": "2023-01-01T00:00:00Z"
     *     }
     *   ],
     *   "meta": {
     *     "current_page": 1,
     *     "total": 10,
     *     "per_page": 15
     *   }
     * }
     * @response status=404 {
     *   "message": "Category not found"
     * }
     */
    public function posts(Category $category, Request $request)
    {
        $query = $category->posts()->where('status', 'published');

        if ($q = $request->query('q')) {
            $query->where('title', 'like', "%{$q}%");
        }

        $perPage = (int) $request->query('per_page', 15);

        $posts = $query->with(['categories', 'author'])->paginate($perPage);

        return \Modules\Blog\Http\Resources\PostResource::collection($posts);
    }
}
