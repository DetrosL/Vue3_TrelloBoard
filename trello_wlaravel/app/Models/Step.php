<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        // 'user_id',
        'desc',
        'completed',
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