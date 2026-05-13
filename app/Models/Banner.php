<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'thumbnail',
        'mobile_image',
        'page',
        'position',
        'type',
        'button_text',
        'button_link',
        'order',
        'is_featured',
        'status',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];
}