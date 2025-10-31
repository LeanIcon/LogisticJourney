<?php

declare(strict_types=1);

namespace Modules\Blocks\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Blocks\Database\Factories\BlockFactory;

final class Block extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'type', 'data', 'order',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function blockable()
    {
        return $this->morphTo();
    }

    // protected static function newFactory(): BlockFactory
    // {
    //     // return BlockFactory::new();
    // }
}
