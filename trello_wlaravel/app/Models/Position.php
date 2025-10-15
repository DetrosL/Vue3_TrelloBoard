<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'cod',
        'desc',
        'status',
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
