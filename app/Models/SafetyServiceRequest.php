<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SafetyServiceRequest extends Model
{
    protected $fillable = [
        'company_name',
        'business_type',
        'street_address',
        'city',
        'state',
        'zip_code',
        'name',
        'title',
        'phone',
        'email',
        'service_required'
    ];
}