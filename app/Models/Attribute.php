<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'attribute_group_id',
        'name',
        'product_id',
        'value',
        'group_name',
        'display_order',
    ];

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class, 'product_attributes', 'attribute_id', 'product_id')
    //         ->withPivot('value')
    //         ->withTimestamps();
    // }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function group()
    {
        return $this->belongsTo(AttributeGroup::class, 'attribute_group_id');
    }
}
