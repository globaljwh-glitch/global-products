<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Offer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'offer_code',
        'discount_type',
        'discount_value',
        'offer_start',
        'offer_end',
        'image',
        'button_text',
        'button_url',
        'is_featured',
        'status',
        'display_order',
    ];

    protected $casts = [
        'offer_start' => 'datetime',
        'offer_end' => 'datetime',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($offer) {

            if (empty($offer->slug)) {
                $offer->slug = Str::slug($offer->title);
            }
        });
    }
}