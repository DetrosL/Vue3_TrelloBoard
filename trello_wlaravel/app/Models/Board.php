<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'title',
    ];

     public function users()
    {
        
        return $this->belongsToMany(User::class)->using(UserBoard::class)->withPivot(['user_id','board_id']);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
