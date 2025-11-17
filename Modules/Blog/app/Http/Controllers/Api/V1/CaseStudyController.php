<?php

namespace Modules\Blog\Http\Controllers\Api\V1;

use Illuminate\Routing\Controller;
use Modules\Blog\Http\Resources\CaseStudyResource;
use Modules\Blog\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Case Studies
 *
 * Endpoints for managing and viewing case studies.
 *
 * Resource fields:
 * - id: int
 * - title: string
 * - slug: string
 * - featured_image: string|null (main image, raw value)
 * - client: object
 *     - name: string
 *     - logo: string|null (raw value)
 *     - quote: string
 *     - quote_author: string
 *     - quote_author_title: string
 * - content: object
 *     - banner: string|null (raw featured_image)
 *     - introduction: string
 *     - the_problem: string
 *     - the_solution: string
 *     - the_result: string
 *     - the_road_ahead: string
 * - sidebar: object
 *     - industry: string
 *     - location: string
 *     - engagement_type: string
 *     - implementation_period: string
 *     - solution: string
 *     - logo: string|null (URL)
 * - meta: object
 *     - meta_title: string|null
 *     - meta_description: string|null
 *     - status: string
 *     - is_featured: bool
 *     - published_at: string|null
 *     - created_at: string
 *     - updated_at: string
 */
final class CaseStudyController extends Controller
{
    /**
     * List all published case studies
     *
     * @queryParam featured boolean Optional. If true, only featured case studies are returned.
     * @queryParam per_page int Optional. Number of results per page. Default: 15
     *
     * @responseField data[].id int The ID of the case study
     * @responseField data[].title string The title
     * @responseField data[].slug string The slug
    * @responseField data[].featured_image string|null Main image (raw value)
    * @responseField data[].client object Client info (raw logo)
    * @responseField data[].content object Main content sections (includes banner)
    * @responseField data[].sidebar object Sidebar info (logo is URL)
    * @responseField data[].meta object Meta info
     *
     * @return AnonymousResourceCollection
     */
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

    /**
     * Show a single published case study by slug
     *
     * @urlParam slug string required The slug of the case study
     *
     * @responseField id int The ID of the case study
     * @responseField title string The title
     * @responseField slug string The slug
    * @responseField featured_image string|null Main image (raw value)
    * @responseField client object Client info (raw logo)
    * @responseField content object Main content sections (includes banner)
    * @responseField sidebar object Sidebar info (logo is URL)
    * @responseField meta object Meta info
     *
     * @return CaseStudyResource
     */
    public function show(string $slug): CaseStudyResource
    {
        $caseStudy = CaseStudy::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        return new CaseStudyResource($caseStudy);
    }

    /**
     * Get the latest featured published case study
     *
     * @responseField id int The ID of the case study
     * @responseField title string The title
     * @responseField slug string The slug
     * @responseField featured_image string|null Main image URL
     * @responseField client object Client info
     * @responseField content object Main content sections
     * @responseField sidebar object Sidebar info
     * @responseField meta object Meta info
     *
     * @return CaseStudyResource
     */
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
