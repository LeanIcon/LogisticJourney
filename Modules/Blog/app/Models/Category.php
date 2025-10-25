<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;

// use Modules\Blog\Database\Factories\CategoryFactory;

class Category extends Model
{
    use HasFactory, HasTags;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'sub_title',
        'slug',
        'image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'creator_id',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): CategoryFactory
    // {
    //     // return CategoryFactory::new();
    // }
}
