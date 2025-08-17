<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpeningApplication extends Model
{
    use HasFactory;

    protected $table = 'job_applications';

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'resume_path',
        'message',
        'status',
    ];

    public function opening()
    {
        return $this->belongsTo(Opening::class, 'job_id');
    }
}

