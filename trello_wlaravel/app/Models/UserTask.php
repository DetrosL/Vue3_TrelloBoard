<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTask extends Pivot
{
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tasks(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}