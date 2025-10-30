<?php

declare(strict_types=1);

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Blog\Database\Factories\AuthorFactory;

final class Author extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'bio',
        'website',
    ];

    // protected static function newFactory(): AuthorFactory
    // {
    //     // return AuthorFactory::new();
    // }
}
