<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerProfileDetail extends Model
{
    protected $table = 'customer_profile_details';

    protected $fillable = [
        'customer_id',
        'profile_image',
        'phone',
        'alternate_phone',
        'gender',
        'dob',
        'address_line1',
        'address_line2',
        'landmark',
        'pincode',
        'city',
        'state',
        'country',
        'address_type',
        'company_name',
        'gst_number',
        'newsletter',
        'sms_updates'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
