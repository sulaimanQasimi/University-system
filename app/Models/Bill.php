<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable=['class_room_id','fee','student_id','paid','remain'];

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class,'class_room_id','id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }



}
