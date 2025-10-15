<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'status',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function boards()
    {
        return $this->belongsToMany(Board::class)->using(UserBoard::class)->withPivot(['user_id','board_id']);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)->using(UserTask::class)->withPivot(['user_id','task_id']);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function attaches()
    {
        return $this->hasMany(Attach::class);
    }
}
