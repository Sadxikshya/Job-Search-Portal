<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Job;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasApiTokens ,Notifiable;

    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_type',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }


     public function isEmployer(): bool
    {
        return $this->role_type === 'employer';
    }

    public function isJobseeker(): bool
    {
        return $this->role_type === 'jobseeker';
    }

    public function isAdmin(): bool
    {
        return $this->role_type === 'admin';
    }

   public function canAccessPanel(Panel $panel): bool
    {
        return $this->isAdmin();
    }

    public function jobs():HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class,'user_id');
    }

    // Jobs the user applied to
    public function appliedJobs()
    {
        return $this->belongsToMany(Job::class, 'job_applications', 'user_id', 'job_id')
                    ->withPivot('jobseeker_name', 'employer_name','status')
                    ->withTimestamps();
    }

    public function jobseekerProfile()
    {
        return $this->hasOne(JobSeekerProfile::class);
    }

    public function hasCompletedProfile()
    {
        return $this->isJobseeker() && $this->jobseekerProfile()->exists();
    }


}