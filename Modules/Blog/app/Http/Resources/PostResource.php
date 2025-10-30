<?php

declare(strict_types=1);

namespace Modules\Blog\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            // 'sub_title' => $this->sub_title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->body ?? $this->content,
            'published_at' => optional($this->published_at)->toDateTimeString(),
            'is_published' => $this->status === 'published',
            'categories' => $this->whenLoaded('categories', function () {
                return $this->categories->map(function ($c) {
                    return ['id' => $c->id, 'name' => $c->name, 'slug' => $c->slug];
                })->values();
            }),
            'author' => $this->whenLoaded('author', function () {
                return [
                    'id' => $this->author?->id,
                    'name' => $this->author?->name ?? $this->author_name,
                ];
            }),
            'meta' => [
                'title' => $this->meta_title,
                // meta_keywords is not defined on posts table; keep null for now
                'keywords' => null,
                'description' => $this->meta_description,
            ],
        ];
    }
}
