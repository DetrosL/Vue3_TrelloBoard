<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'position_id',
        'nome',
        'dt_start',
        'dt_end',
    ];

     public function users()
    {
        return $this->belongsToMany(User::class)->using(UserTask::class)->withPivot(['user_id','task_id']);
    }

   
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
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
