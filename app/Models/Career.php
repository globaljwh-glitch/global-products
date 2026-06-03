<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title',
        'location',
        'job_type',
        'posted_date',
        'overview',
        'responsibilities',
        'skills',
        'qualifications',
        'offer',
        'is_active',
    ];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }
}