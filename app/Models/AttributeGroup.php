<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'display_order',
        'is_active',
    ];

    /**
     * Relationship: Group has many attributes
     */
    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}