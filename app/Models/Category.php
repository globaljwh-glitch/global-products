<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
        'image',
        'thumbnail',
        'icon',
        'meta_title',
        'meta_description',
        'is_featured',
        'status',
        'display_order'
    ];

    public function parent()
    {
        //return $this->belongsTo(Category::class, 'parent_id');
        return $this->belongsTo(Category::class, 'parent_id')
        ->with('parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

//     public function parent()
// {
//     return $this->belongsTo(Category::class, 'parent_id');
// }

// public function children()
// {
//     return $this->hasMany(Category::class, 'parent_id');
// }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    public static function generateSlug($name, $id = null)
    {
        $baseSlug = \Str::slug($name);

        $slug = $baseSlug;

        $count = 1;

        while (
            self::where('slug', $slug)
                ->when($id, function ($query) use ($id) {
                    $query->where('id', '!=', $id);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count;

            $count++;
        }

        return $slug;
    }

    public function getFullPathAttribute()
    {
        $path = [];
        $category = $this;

        while ($category) {
            array_unshift($path, $category->name);
            $category = $category->parent;
        }

        return implode(' > ', $path);
    }
}
