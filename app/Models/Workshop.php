<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
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
