<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Date;

class ExamStudent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['student_id', 'exam_id', 'active',
        'successMark', 'mid', 'final', 'homework', 'classActivity',];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function exam()
    {
        return $this->belongsTo(ClassExam::class, 'exam_id', 'id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function getTotalMarksAttribute($value)
    {
        return $this->mid + $this->homework + $this->classActivity + $this->final;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Date::make($value);
    }

    /*public function getUpdatedAtTimeAttribute($value)
        {
            return Date::make($this->updated_at)->format('H:i:s');
        }*/

    public function getResultAttribute($value)
    {
        if ($this->total_marks >= $this->exam->pass_mark) {
            return __('exam.success');
        } else {
            return __('exam.chance');
        }
    }
}
