<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
    ];

    public function getTypeAttribute($value): string
    {
        return \App\Enum\AnnouncementTypes::from($value)->getName();
    }
}
