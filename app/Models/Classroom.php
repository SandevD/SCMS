<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name',
        'building_id'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function building() {
        return $this->belongsTo(Building::class);
    }
}
