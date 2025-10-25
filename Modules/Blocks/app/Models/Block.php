<?php

namespace Modules\Blocks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Blocks\Database\Factories\BlockFactory;

class Block extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'type', 'data', 'order'
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
