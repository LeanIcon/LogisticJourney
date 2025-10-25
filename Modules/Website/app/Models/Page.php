<?php

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Website\Database\Factories\PageFactory;

class Page extends Model
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
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * Accessors
     */
    public function getUrlAttribute(): string
    {
        return url('/' . ltrim($this->slug, '/'));
    }

    // protected static function newFactory(): PageFactory
    // {
    //     // return PageFactory::new();
    // }
}
