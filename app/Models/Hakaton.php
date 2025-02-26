<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hakaton extends Model
{
    protected $guarded = false;
    protected function casts(): array
    {
        return [
            'start_date_begin' => 'date',
            'start_date_end' => 'date',
            'registration_date_begin' => 'date',
            'registration_date_end' => 'date'
        ];
    }
}
