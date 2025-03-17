<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'name',
        'from_year',
        'to_year',
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
