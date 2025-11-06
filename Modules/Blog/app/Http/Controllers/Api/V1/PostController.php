<?php

declare(strict_types=1);

namespace Modules\Blog\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Models\Post;

final class PostController extends Controller
{
    /**
     * List all published blog posts.
     *
     * @group Blog Posts
     * @authenticated false
     *
     * Returns a paginated list of published blog posts with optional filtering and search.
     *
     * @queryParam type string Filter posts by type (e.g. 'article', 'news'). Example: article
     * @queryParam category string Filter posts by category slug or ID. Example: news
     * @queryParam q string Search in title, excerpt and body. Example: cloud computing
     * @queryParam per_page integer Number of posts per page. Default: 15
     * @queryParam sort string Field to sort by (published_at, title). Example: published_at
     * @queryParam direction string Sort direction (asc, desc). Example: desc
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
     *         "alt": "Cloud Computing Diagram"
     *       },
     *       "author": {
     *         "id": 1,
     *         "name": "John Doe",
     *         "avatar": "https://example.com/avatars/john.jpg"
     *       },
     *       "categories": [
     *         {
     *           "id": 1,
     *           "name": "Technology",
     *           "slug": "tech"
     *         }
     *       ],
     *       "published_at": "2023-01-01T00:00:00Z",
     *       "reading_time": "5 min"
     *     }
     *   ],
     *   "meta": {
     *     "current_page": 1,
     *     "total": 50,
     *     "per_page": 15
     *   }
     * }
     */
    public function index(Request $request)
    {
        $query = Post::query();

        // only published posts
        $query->where('status', 'published');
        if ($request->filled('type')) {
            $query->where('type', $request->query('type'));
        }

        if ($request->filled('category')) {
            $category = $request->query('category');
            $query->whereHas('categories', function ($q) use ($category) {
                $q->where('slug', $category)->orWhere('id', $category);
            });
        }

        if ($q = $request->query('q')) {
            $query->where(function ($q2) use ($q) {
                $q2->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%")
                    ->orWhere('body', 'like', "%{$q}%");
            });
        }

        $perPage = (int) $request->query('per_page', 15);
        $sort = $request->query('sort', 'published_at');
        $direction = $request->query('direction', 'desc');

        $posts = $query->with(['categories', 'author'])->orderBy($sort, $direction)->paginate($perPage);

        return \Modules\Blog\Http\Resources\PostResource::collection($posts);
    }

    /**
     * Get a single blog post.
     *
     * @group Blog Posts
     * @authenticated false
     *
     * Returns detailed information about a specific blog post.
     *
     * @urlParam post string required The post ID. Example: 1
     *
     * @response scenario=success {
     *   "data": {
     *     "id": 1,
     *     "title": "Introduction to Cloud Computing",
     *     "slug": "intro-to-cloud-computing",
     *     "excerpt": "Learn the basics of cloud computing...",
     *     "body": "Cloud computing is the delivery of computing services...",
     *     "type": "article",
     *     "featured_image": {
     *       "url": "https://example.com/images/cloud.jpg",
     *       "alt": "Cloud Computing Diagram"
     *     },
     *     "author": {
     *       "id": 1,
     *       "name": "John Doe",
     *       "avatar": "https://example.com/avatars/john.jpg",
     *       "bio": "Tech writer and cloud expert"
     *     },
     *     "categories": [
     *       {
     *         "id": 1,
     *         "name": "Technology",
     *         "slug": "tech"
     *       }
     *     ],
     *     "published_at": "2023-01-01T00:00:00Z",
     *     "reading_time": "5 min",
     *     "meta": {
     *       "description": "Learn the fundamentals of cloud computing",
     *       "keywords": "cloud,computing,technology"
     *     }
     *   }
     * }
     * @response status=404 {
     *   "message": "Post not found"
     * }
     */
    public function show(Post $post)
    {
        // ensure published or allow preview
        if ($post->status !== 'published') {
            abort(404);
        }

        $post->load(['categories', 'author']);

        return new \Modules\Blog\Http\Resources\PostResource($post);
    }
}
