<?php

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Website\Database\Factories\LeadFactory;

class Lead extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'source',
        'status',
        'assigned_to',
    ];

    // protected static function newFactory(): LeadFactory
    // {
    //     // return LeadFactory::new();
    // }
}
