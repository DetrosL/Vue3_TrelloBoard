<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    
    protected $fillable = [
        'title',
    ];

     public function users()
    {
        
        return $this->belongsToMany(User::class)->using(UserBoard::class)->withPivot(['user_id','board_id']);
        // return $this->belongsToMany(User::class, 'user_boards','id_board', 'id_user')->using(UserBoard::class)->withPivot(['id_user', 'id_board']);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
