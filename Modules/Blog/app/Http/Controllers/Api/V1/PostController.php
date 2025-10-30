<?php

declare(strict_types=1);

namespace Modules\Blog\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Models\Post;

final class PostController extends Controller
{
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
