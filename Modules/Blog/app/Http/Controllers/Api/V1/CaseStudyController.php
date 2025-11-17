<?php

namespace Modules\Blog\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Modules\Blog\Http\Resources\CaseStudyResource;
use Modules\Blog\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class CaseStudyController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = CaseStudy::query()
            ->published()
            ->latest('published_at');

        if ($request->has('featured')) {
            $query->featured();
        }

        $perPage = $request->get('per_page', 15);
        $caseStudies = $query->paginate($perPage);

        return CaseStudyResource::collection($caseStudies);
    }

    public function show(string $slug): CaseStudyResource
    {
        $caseStudy = CaseStudy::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return new CaseStudyResource($caseStudy);
    }

    public function featured(): CaseStudyResource
    {
        $caseStudy = CaseStudy::query()
            ->published()
            ->featured()
            ->latest('published_at')
            ->firstOrFail();

        return new CaseStudyResource($caseStudy);
    }
}
