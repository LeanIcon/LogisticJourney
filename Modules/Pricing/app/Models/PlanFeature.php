<?php

declare(strict_types=1);

namespace Modules\Pricing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Pricing\Database\Factories\PlanFeatureFactory;

final class PlanFeature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'plan_id',
        'feature_name',
        'feature_value',
        'is_included',
    ];

    // protected static function newFactory(): PlanFeatureFactory
    // {
    //     // return PlanFeatureFactory::new();
    // }
}
