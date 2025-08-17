<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'location',
        'salary',
        'employment_type',
        'is_active',
        'is_published',
    ];

    public function applications()
    {
        return $this->hasMany(OpeningApplication::class, 'job_id');
    }
}

