<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'name',
        'date',
        'start_time',
        'end_time',
        'status'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'status' => 'boolean',
    ];
}
