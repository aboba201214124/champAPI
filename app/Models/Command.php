<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Command extends Model
{
    protected $guarded = false;
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'Owner');
    }
}
