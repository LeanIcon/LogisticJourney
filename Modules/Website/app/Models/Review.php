<?php

declare(strict_types=1);

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Website\Database\Factories\ReviewFactory;

final class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'image',
        'review',
        'rating',
        'status',
    ];

    // protected static function newFactory(): ReviewFactory
    // {
    //     // return ReviewFactory::new();
    // }
}
