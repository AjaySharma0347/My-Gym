<?php

namespace App\Models;

use App\Models\User;
use App\Models\ClassType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScheduledClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructor_id',
        'date_time',
        'class_type_id',
    ];

    protected $casts = [
        'date_time' => 'datetime',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'bookings');
    }
}