<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //

     public function users()
    {
        return $this->belongsToMany(User::class, 'user_boards','id_board', 'id_user')->using(UserBoard::class)->withPivot(['id_user', 'id_board']);
    }
}
