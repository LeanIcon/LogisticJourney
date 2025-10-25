<?php

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Website\Database\Factories\ReviewFactory;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'other_details',
        'review',
        'rating',
        'status',
    ];

    // protected static function newFactory(): ReviewFactory
    // {
    //     // return ReviewFactory::new();
    // }
}
