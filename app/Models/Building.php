<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'name'
    ];

    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}
