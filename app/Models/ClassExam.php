<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Subject;
use Illuminate\Support\Facades\Date;

class ClassExam extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = true;
    protected $primaryKey = "id";
    protected $fillable = ['class_room_id', 'subject_id', 'teacher_id', 'number_of_question', 'question_mark', 'date', 'result', 'pass_mark'];


    public function getUserIDAttribute($value)
    {
        return $this->teacher->user_id;
    }
    public function getTimeAttribute($value)
    {
        return Date::make($this->date)->format('h:i:sa');
//        return 0;
    }
    public function getDatesAttribute($value)
    {
        return Date::make($this->date)->format('Y-m-d');

    }
    public function getResultDateAttribute($value)
    {
        return Date::make($this->result)->format('Y-m-d h:i:s');
//   return 0;
    }
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_room_id', 'id');

    } public function classroom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id', 'id');

    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');

    }

    public function students()
    {
        return $this->hasManyThrough(Student::class, ExamStudent::class, 'exam_id', 'id', 'id', 'student_id');

    }
    public function Examstudents()
    {
        return $this->hasMany(ExamStudent::class, 'exam_id','id');

    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');

    }

    public function question()
    {
        return $this->hasOne(ExamQuestion::class, 'exam_id', 'id');

    }
}
