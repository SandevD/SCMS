<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'start',
        'end',
        'status'
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'status' => 'boolean',
    ];
}
