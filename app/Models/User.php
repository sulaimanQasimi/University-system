<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'profile_photo_path','last_login','last_logout'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function scopeActive($query)
    {
        return $query->where('role_id', 1);
    }

    public function getLastLoginAttribute($value)
    {
        if ($value !=null){

            return Date::make($value)->ago();
        }
        return 0;

    }
    public function account()
    {
        if (Auth::check()) {
            switch (Auth::user()->role_id) {
                case 2:
//                    return 'Header'
                    return $this->hasOne(Department::class, 'user_id', 'id');
                    break;
                case 3:
                    return 'SubHeader';
                    break;
                case 4:
                    return 'Finance';
                    break;
                case 5:
                    return 'Exam Controller';
                    break;
                case 6:
//                    return 'Teacher';

                    return $this->hasOne(Teacher::class, 'user_id', 'id');
                    break;
                case 7:
                    return 'Student';
                    break;
                default:
                    return false;
            }
        } else {
            return false;
        }

    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'user_id', 'id');
    }

    public function sub_department()
    {
        return $this->hasOne(SubDepartment::class, 'user_id', 'id');
    }
    public function department()
    {
        return $this->hasOne(Department::class, 'user_id', 'id');
    } public function student()
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function getIsAdminAttribute($value)
    {
        if($this->role_id ==1){
           return true;
        }else{
            return false;
        }
    }
}
