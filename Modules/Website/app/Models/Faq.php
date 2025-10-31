<?php

declare(strict_types=1);

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\Website\Database\Factories\FaqFactory;

final class Faq extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'question',
        'answer',
        'status',
    ];

    // protected static function newFactory(): FaqFactory
    // {
    //     // return FaqFactory::new();
    // }
}
