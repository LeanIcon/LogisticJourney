<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\Blog\Database\Factories\ArticleFactory;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'sub_title',
        'content',
        'slug',
        'image',
        'author_name',
        'is_published',
        'published_at',
        'visits',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'category_id',
        'author_id',
        'creator_id',
        'last_editor_id',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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

    // protected static function newFactory(): ArticleFactory
    // {
    //     // return ArticleFactory::new();
    // }
}
