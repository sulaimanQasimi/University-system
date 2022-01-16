<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'grade', 'edition'];

    public function schedules()
    {
        return $this->hasMany(ClassSchedule::class,'subject_id','id');

    }
}
