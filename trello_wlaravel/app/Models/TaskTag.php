<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskTag extends Pivot
{
    public function tasks(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    
    public function tags(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}