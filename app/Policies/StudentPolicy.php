<?php

namespace App\Policies;

use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */

    public function viewAny(User $user)
    {
        return $user->role_id === 2 || $user->role_id === 3 || $user->role_id === 8;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\Student $student
     * @return mixed
     */
    public function view(User $user, Student $student)
    {
        return $student->user_id === $user->id || $user->role_id === 8;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role->id === 8;
    }

    public function printProfile(User $user)
    {

        return $user->role->id === 8;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\Student $student
     * @return mixed
     */
    public function update(User $user, Student $student)
    {
        return $user->id === ($student->user) ? $student->user->id : 0;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\Student $student
     * @return mixed
     */
    public function delete(User $user, Student $student)
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\Student $student
     * @return mixed
     */
    public function restore(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\Student $student
     * @return mixed
     */
    public function forceDelete(User $user, Student $student)
    {
        return $user->role_id === 1;
    }
}
