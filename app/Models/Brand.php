<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
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

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class);
    // }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function breadcrumbs()
    {
        $breadcrumbs = collect();

        $brand = $this;

        while ($brand) {
            $breadcrumbs->prepend($brand);
            $brand = $brand->parent;
        }

        return $breadcrumbs;
    }
}
