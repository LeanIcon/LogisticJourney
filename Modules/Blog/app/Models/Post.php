<?php

declare(strict_types=1);

namespace Modules\Blog\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Blog\Database\Factories\ArticleFactory;

final class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'author_id',
        'creator_id',
        'type',
        'banner',
        'featured_image',
        'excerpt',
        'body',
        'status',
        'scheduled_for',
        'published_at',
        'is_featured',
        'meta_title',
        'meta_description',

    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lastEditor(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): PostFactory
    // {
    //     // return PostFactory::new();
    // }
}
