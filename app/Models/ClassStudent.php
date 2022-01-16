<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassStudent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function classes()
    {
        return $this->belongsTo(ClassRoom::class,'class_room_id','id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
