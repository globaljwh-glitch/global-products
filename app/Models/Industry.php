<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Industry extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'banner',
        'description',
        'meta_title',
        'meta_description',
        'is_featured',
        'is_exclusive',
        'status',
        'display_order',
    ];

    // Auto slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->name . '-' . time());
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->name . '-' . time());
        });
    }

    // Relationships
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'industry_categories');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'industry_products');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'industry_brands');
    }
}