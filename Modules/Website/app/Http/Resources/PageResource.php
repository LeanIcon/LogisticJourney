<?php

declare(strict_types=1);

namespace Modules\Website\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class PageResource extends JsonResource
{
    /**
     * Transform the page resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'type' => $this->type,
            'url' => $this->url, // Uses the accessor from Page model

            // Content fields
            'content' => $this->content, // Legacy text content
            'blocks' => $this->blocks, // Block-based content (JSON)

            // Hierarchy
            'parent_id' => $this->parent_id,
            'parent' => $this->whenLoaded('parent', function () {
                return [
                    'id' => $this->parent->id,
                    'title' => $this->parent->title,
                    'slug' => $this->parent->slug,
                    'url' => $this->parent->url,
                ];
            }),
            'children' => $this->whenLoaded('children', function () {
                return $this->children->map(function ($child) {
                    return [
                        'id' => $child->id,
                        'title' => $child->title,
                        'slug' => $child->slug,
                        'url' => $child->url,
                    ];
                });
            }),

            // SEO/Meta
            'meta' => [
                'title' => $this->meta_title ?? $this->title,
                'description' => $this->meta_description,
            ],

            // Additional metadata
            'status' => $this->status,
            'created_at' => optional($this->created_at)->toIso8601String(),
            'updated_at' => optional($this->updated_at)->toIso8601String(),
        ];
    }
}
