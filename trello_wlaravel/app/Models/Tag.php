<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'desc',
        'color',
    ];
    
    protected $hidden = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class)->using(TaskTag::class)->withPivot(['task_id', 'tag_id']);
    }
}