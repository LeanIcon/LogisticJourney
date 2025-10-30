<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Blog\Models\Post;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('shows a single published post by slug', function () {
    $post = Post::create([
        'title' => 'My Post',
        'slug' => 'my-post',
        'status' => 'published',
        'published_at' => now(),
        'body' => 'Hello world',
    ]);

    $response = $this->getJson('/api/v1/posts/'.$post->slug);

    $response->assertOk();
    $response->assertJsonPath('data.slug', 'my-post');
    $response->assertJsonPath('data.title', 'My Post');
});
