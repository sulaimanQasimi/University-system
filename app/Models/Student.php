<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Date;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['id', 'user_id', 'firstname', 'lastname', 'fathername', 'grade', 'grandfathername',
        'dateofbirth', 'phone', 'address', 'sex', 'college_id', 'year', 'school', 'kankor_id', 'image'];

    public function classStudent()
    {
        return $this->hasMany(ClassStudent::class, 'student_id', 'id');
    }

    public function removed()
    {
        return $this->hasMany(ClassStudent::class, 'student_id', 'id')->onlyTrashed();
    }

    public function department()
    {
        return $this->belongsTo(SubDepartment::class, 'department_id', 'id');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function examStudent()
    {
        return $this->hasMany(ExamStudent::class, 'student_id', 'id');
    }

    public function exams()
    {
        return $this->hasManyThrough(ClassExam::class, ExamStudent::class, 'student_id', 'id');

    } public function classrooms()
    {
        return $this->hasManyThrough(ClassRoom::class, ClassStudent::class, 'student_id', 'id','id','class_room_id');

    }

    public function getLastGradeAttribute($value)
    {
        $class = $this->classStudent()->orderBy('id', 'desc')->first();

        if ($class != null) {
            return $class->classes;
        } else {
            return null;
        }


    }

    public function GetLastClassNameAttribute($value)
    {
        $class = $this->classStudent()->orderBy('id', 'desc')->first();

        if ($class != null) {
            return $class->classes->name;
        } else {
            return 'ندارد';
        }

    }

    public function getLastGradesAttribute($value)
    {
        return $this->classStudent()->orderBy('id', 'desc')->first();
    }

    public function classes()
    {
        return $this->hasManyThrough(Classes::class, ClassStudent::class, 'student_id', 'id');

    }

    public function history()
    {

        return $this->hasMany(StudentProfile::class, 'student_id', 'id');

    }

    public function getRegisterDateAttribute($value)
    {
        if ($this->created_at != null) {

            return Date::make($this->created_at)->format('Y-m-d/h:i:sa');
        } else {
            return 'N/A';
        }

    }

    public function getEmailAttribute($value)
    {
        if ($this->user != null) {

            return $this->user->email;
        } else {
            return 'N/A';
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";

    }

    public function getIdsAttribute()
    {
        return "SII-{$this->id}";

    }


}
