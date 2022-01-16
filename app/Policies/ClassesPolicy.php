<?php

namespace App\Policies;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassesPolicy
{
    use HandlesAuthorization;
    public function before(User $user, $ability)
    {
        if ($user->role_id ==1){
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classes  $classes
     * @return mixed
     */
    public function view(User $user, Classes $classes)
    {
       return $user->id === $classes->department->user->id ||  $user->id === $classes->department->department->user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classes  $classes
     * @return mixed
     */
    public function update(User $user, Classes $classes)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classes  $classes
     * @return mixed
     */
    public function delete(User $user, Classes $classes)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classes  $classes
     * @return mixed
     */
    public function restore(User $user, Classes $classes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Classes  $classes
     * @return mixed
     */
    public function forceDelete(User $user, Classes $classes)
    {
        //
    }
}
