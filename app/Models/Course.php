<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'batch_id',
        'classroom_id',
        'name',
        'max_student_limit',
        'description',
        'day',
        'start_time',
        'end_time',
        'starting_date',
        'ending_date',
    ];

    public function batch() {
        return $this->belongsTo(Batch::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
