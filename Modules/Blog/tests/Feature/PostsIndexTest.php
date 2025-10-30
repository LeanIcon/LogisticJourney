<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Blog\Models\Post;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('returns only published posts on the index endpoint', function () {
    // create one published and one draft
    $published = Post::create([
        'title' => 'Published Post',
        'slug' => 'published-post',
        'status' => 'published',
        'published_at' => now(),
    ]);

    $draft = Post::create([
        'title' => 'Draft Post',
        'slug' => 'draft-post',
        'status' => 'draft',
    ]);

    $response = $this->getJson('/api/v1/posts');

    $response->assertOk();
    $response->assertJsonPath('data.0.slug', 'published-post');
    $response->assertJsonMissing(['slug' => 'draft-post']);
});
