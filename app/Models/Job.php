<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs_listings'; // naming arkai bhayera natra job ko jobs table ma hunthyo

    //protected $fillable = ['title', 'salary', 'description', 'location', 'job_type', 'user_id'];

    protected $guarded = [];

    public function user() // now the employer is the user
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

}
