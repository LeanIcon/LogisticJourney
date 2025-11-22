<?php

namespace Modules\Blog\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaseStudyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'featured_image' => $this->featured_image ? asset('storage/' . $this->featured_image) : null,
            'client' => [
                'name' => $this->client_name,
                'logo' => $this->client_logo ? asset('storage/' . $this->client_logo) : null,
                'quote' => $this->excerpt,
                'quote_author' => $this->quote_author,
                'quote_author_title' => $this->quote_author_title,
            ],
            'content' => [
                'banner' => $this->featured_image ? asset('storage/' . $this->featured_image) : null,
                'introduction' => $this->introduction,
                'the_problem' => $this->the_problem,
                'the_solution' => $this->the_solution,
                'the_result' => $this->the_result,
                'the_road_ahead' => $this->the_road_ahead,
            ],
            'sidebar' => [
                'industry' => $this->industry,
                'location' => $this->location,
                'engagement_type' => $this->engagement_type,
                'implementation_period' => $this->implementation_period,
                'solution' => $this->solution,
                'logo' => $this->client_logo ? asset('storage/' . $this->client_logo) : null,
            ],
            'meta' => [
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
                'status' => $this->status,
                'is_featured' => $this->is_featured,
                'published_at' => $this->published_at?->toIso8601String(),
                'created_at' => $this->created_at?->toIso8601String(),
                'updated_at' => $this->updated_at?->toIso8601String(),
            ],
        ];
    }
}
