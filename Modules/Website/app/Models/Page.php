<?php

declare(strict_types=1);

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// use Modules\Website\Database\Factories\PageFactory;

final class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'type',
        'content',
        'meta_title',
        'meta_description',
        'status',
        'parent_id',
        'blocks',
    ];

    protected $casts = [
        'meta' => 'array',
        'blocks' => 'array',
    ];

    /**
     * Relations
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * Scopes
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Accessors
     */
    public function getUrlAttribute(): string
    {
        return url('/'.mb_ltrim($this->slug, '/'));
    }

    // protected static function newFactory(): PageFactory
    // {
    //     // return PageFactory::new();
    // }
}
