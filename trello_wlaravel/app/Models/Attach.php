<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attach extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'url',
        'qtd',
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
