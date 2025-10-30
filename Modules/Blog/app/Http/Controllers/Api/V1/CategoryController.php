<?php

declare(strict_types=1);

namespace Modules\Blog\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Blog\Models\Category;

final class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->orderBy('name')->get();

        return response()->json(['data' => $categories]);
    }

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
