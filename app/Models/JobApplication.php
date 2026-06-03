<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'career_id',
        'full_name',
        'email',
        'phone_number',
        'resume',
        'cover_letter',
        'status',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
    
}