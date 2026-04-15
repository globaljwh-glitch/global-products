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
        'status',
        'display_order',
    ];

    // Categories
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Brands
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
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
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)
            ->withPivot('value')
            ->withTimestamps();
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)
            ->where('is_primary', true);
    }
}