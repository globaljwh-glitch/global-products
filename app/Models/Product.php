<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'mpn',
        'price',
        'description',
        'other',
        'status',
        'display_order',
        'is_exclusive',
        'is_featured',
        'external_url',
        'external_url_label',
        'model_number',
    ];

    // Categories
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Brands
    // public function brands()
    // {
    //     return $this->belongsToMany(Brand::class);
    // }
    public function brands()
    {
        return $this->belongsToMany(Brand::class)
            ->withTimestamps();
    }

    // Vendors
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class)
            ->withPivot('price', 'stock')
            ->withTimestamps();
    }

    // Images
    public function images()
    {
        return $this->hasMany(ProductImage::class)
            ->orderBy('display_order');
    }

    // Attributes
    // public function attributes()
    // {
    //     return $this->belongsToMany(Attribute::class, 'product_attributes', 'product_id', 'attribute_id')
    //         ->withPivot('value')
    //         ->withTimestamps();
    // }
    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'product_id');
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)
            ->where('is_primary', true);
    }
}