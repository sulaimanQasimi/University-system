<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = ['college_id', 'name', 'grade'];

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function exams()
    {
        return $this->hasMany(ClassExam::class, 'class_room_id', 'id');
    }

    public function students()
    {
        return $this->hasManyThrough(Student::class, ClassStudent::class, 'class_room_id', 'id', 'id', 'student_id');

    }

    public function schedules()
    {
        return $this->hasMany(ClassSchedule::class, 'class_room_id', 'id');
    }

    public function classStudents()
    {
        return $this->hasMany(ClassStudent::class, 'class_room_id', 'id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'class_room_id', 'id');

    }
    /*
     * Student who aren't pay or remain fee
     *
     *
     * */
    public function students_bill()
    {
        return $this->hasManyThrough(Student::class, ClassStudent::class, 'class_room_id', 'id', 'id', 'student_id');

    } public function teachers()
{
    return $this->hasManyThrough(Teacher::class, ClassSchedule::class, 'class_room_id', 'id', 'id', 'teacher_id');

}
}
