<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'status',
        'display_order',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
