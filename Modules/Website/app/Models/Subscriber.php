<?php

namespace Modules\Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Website\Database\Factories\SubscriberFactory;

class Subscriber extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'email',
        'name',
        'subscribed_at',
        'is_verified',
        'verified_at',
        'status',
        'unsubscribed_at',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'verified_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    // protected static function newFactory(): SubscriberFactory
    // {
    //     // return SubscriberFactory::new();
    // }
}
