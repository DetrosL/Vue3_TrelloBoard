<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'name',
        'desc',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)->using(TagTask::class)->withPivot(['task_id', 'tag_id']);
    }
}