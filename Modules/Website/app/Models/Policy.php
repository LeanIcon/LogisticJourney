<?php

declare(strict_types=1);

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Website\Database\Factories\PolicyFactory;

final class Policy extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'status',
    ];

    // protected static function newFactory(): PolicyFactory
    // {
    //     // return PolicyFactory::new();
    // }
}
