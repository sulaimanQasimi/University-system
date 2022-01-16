<?php

namespace App\Providers;

use App\Models\Bill;
use App\Models\Classes;
use App\Models\ClassExam;
use App\Models\ClassRoom;
use App\Models\College;
use App\Models\Department;
use App\Models\Post;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Team;
use App\Models\User;
use App\Policies\BillPolicy;
use App\Policies\ClassesPolicy;
use App\Policies\ClassExamPolicy;
use App\Policies\ClassroomPolicy;
use App\Policies\CollegePolicy;
use App\Policies\DepartmentPolicy;
use App\Policies\PostPolicy;
use App\Policies\StudentPolicy;
use App\Policies\SubjectPolicy;
use App\Policies\TeacherPolicy;
use App\Policies\TeamPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Department::class=>DepartmentPolicy::class,
        Teacher::class=>TeacherPolicy::class,
        ClassExam::class=>ClassExamPolicy::class,
        User::class=>UserPolicy::class,
        Bill::class=>BillPolicy::class,
        College::class=>CollegePolicy::class,
        ClassRoom::class=>ClassroomPolicy::class,
        Subject::class=>SubjectPolicy::class,
        Student::class=>StudentPolicy::class,
        Post::class=>PostPolicy::class,
        Classes::class=>ClassesPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
