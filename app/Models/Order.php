<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'user_id',

        'order_number',

        'subtotal',

        'shipping_charge',

        'tax',

        'discount',

        'grand_total',

        'payment_method',

        'payment_status',

        'paypal_order_id',

        'transaction_id',

        'status',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}