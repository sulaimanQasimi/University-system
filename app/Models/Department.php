<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['user_id', 'name', 'header', 'phone', 'image'];

    public function colleges()
    {
        return $this->hasMany(College::class, 'department_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

    public function teachers()
    {
        return $this->hasManyThrough(Teacher::class, College::class, 'college_id', 'department_id', 'id');
    }

    public function classes()
    {
        return $this->hasManyThrough(Classes::class, College::class, 'college_id', 'department_id', 'id');
    }


}
