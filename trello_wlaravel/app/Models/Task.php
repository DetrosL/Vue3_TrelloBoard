<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'position_id',
        // 'user_id',
        'nome',
        'dt_start',
        'dt_end',
    ];

    // protected $hidden = [
    //     'creator_id',
    // ];

     public function users()
    {
        return $this->belongsToMany(User::class)->using(UserTask::class)->withPivot(['user_id','task_id']);
    }
}
