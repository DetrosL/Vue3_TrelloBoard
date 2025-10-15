<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBoard extends Pivot
{
 protected $table = 'user_boards';
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class, 'id_board');
        }

        public function boards(): BelongsTo
        {
            return $this->belongsTo(Board::class, 'id_user');
        }
}
