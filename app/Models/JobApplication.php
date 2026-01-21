<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = ['job_id', 'user_id','jobseeker_name', 
        'employer_name','status'];

    public const STATUSES = [
        'reviewing',
        'accepted',
        'rejected',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

}
