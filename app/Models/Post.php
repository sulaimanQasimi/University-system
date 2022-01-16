<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['user_id','txt'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }
    public function getCreateAtAttribute($value)
    {
        if ($this->created_at != null) {

            return Date::make($this->created_at)->format('Y-m-d/h:i:sa');
        } else {
            return 'N/A';
        }

    }

}
