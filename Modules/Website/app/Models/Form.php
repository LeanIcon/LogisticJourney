<?php

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function submissions(): HasMany
    {
        return $this->hasMany(FormSubmission::class);
    }

    // protected static function newFactory(): FormFactory
    // {
    //     // return FormFactory::new();
    // }
}
