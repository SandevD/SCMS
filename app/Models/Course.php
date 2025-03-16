<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'max_student_limit',
        'description',
        'day',
        'start_time',
        'end_time',
        'starting_date',
        'ending_date',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
