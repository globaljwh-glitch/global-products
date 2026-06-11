<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'variant_name',
        'attributes',
        'sku',
        'minimum_quantity',
        'stock',
        'price',
        'compare_price',
        'display_order',
        'status',
    ];

    protected $casts = [
        'attributes' => 'array',
        'status' => 'boolean',
        'price' => 'decimal:2',
        'compare_price' => 'decimal:2',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function getAttributeTextAttribute()
    {
        if (!$this->attributes) {
            return '';
        }

        return collect($this->attributes)
            ->map(fn ($value, $key) => ucfirst($key) . ': ' . $value)
            ->implode(' | ');
    }
}