<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Blog\Models\Category;
use Modules\Blog\Models\Post;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('returns posts for a given category', function () {
    $category = Category::create([
        'name' => 'Tech',
        'slug' => 'tech',
    ]);

    $post = Post::create([
        'title' => 'Tech Post',
        'slug' => 'tech-post',
        'status' => 'published',
        'published_at' => now(),
    ]);

    $post->categories()->attach($category->id);

    $response = $this->getJson('/api/v1/categories/'.$category->slug.'/posts');

    $response->assertOk();
    $response->assertJsonPath('data.0.slug', 'tech-post');
});
