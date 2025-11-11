<?php

declare(strict_types=1);

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Website\Models\Policy;
use Modules\Website\Http\Resources\PolicyResource;

class PolicyController extends Controller
{
    public function index(Request $request): ResourceCollection
    {
        $policies = Policy::query()->latest('updated_at')->get();
        return PolicyResource::collection($policies);
    }

    public function show(Policy $policy): PolicyResource
    {
        return new PolicyResource($policy);
    }
}
