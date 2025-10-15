<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attach extends Model
{
    protected $fillable = [
        'url',
        'qtd',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
