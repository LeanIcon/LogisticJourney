<?php

declare(strict_types=1);

namespace Modules\Pricing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Pricing\Database\Factories\CouponFactory;

final class Coupon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'discount_value',
        'expires_at',
        'usage_limit',
        'used_count',
        'status',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'usage_limit' => 'integer',
        'used_count' => 'integer',
    ];

    // protected static function newFactory(): CouponFactory
    // {
    //     // return CouponFactory::new();
    // }
}
