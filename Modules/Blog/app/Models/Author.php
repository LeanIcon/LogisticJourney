<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Blog\Database\Factories\AuthorFactory;

class Author extends Model
{
    use HasFactory;

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
