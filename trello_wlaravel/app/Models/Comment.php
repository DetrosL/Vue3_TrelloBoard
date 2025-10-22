<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'task_id',
        'desc',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //test
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
