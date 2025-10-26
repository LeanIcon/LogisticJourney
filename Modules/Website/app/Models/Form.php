<?php

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Website\Database\Factories\FormFactory;

class Form extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'fields',
        'settings',
        'status',
    ];

    protected $casts = [
        'fields' => 'array',
        'settings' => 'array',
    ];

    // protected static function newFactory(): FormFactory
    // {
    //     // return FormFactory::new();
    // }
}
