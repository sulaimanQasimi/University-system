<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function schedules()
    {
        return $this->hasMany(ClassSchedule::class, 'teacher_id', 'id');

    }

    public function classrooms()
    {
        return $this->hasManyThrough(ClassRoom::class,ClassSchedule::class,'teacher_id', 'id','id','class_room_id');

    }

    public function exams()
    {
        return $this->hasMany(ClassExam::class, 'teacher_id', 'id');
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', "id");

    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";

    }

    public function college()
    {
        return $this->belongsTo(College::class,'college_id','id');

    }
}
