<?php

declare(strict_types=1);

namespace Modules\Pricing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

// use Modules\Pricing\Database\Factories\PromotionFactory;

final class Promotion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'discount_type',
        'discount_value',
        'applicable_plans',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'applicable_plans' => 'array',
    ];

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'promotion_plan');
    }

    // protected static function newFactory(): PromotionFactory
    // {
    //     // return PromotionFactory::new();
    // }
}
