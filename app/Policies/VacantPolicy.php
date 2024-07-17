<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacant;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->rol === 2;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Vacant $vacant)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->rol === 2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Vacant $vacant)
    {
        return $user->id === $vacant->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Vacant $vacant)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Vacant $vacant)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacant  $vacant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Vacant $vacant)
    {
        //
    }
}
