<?php

namespace App\Policies;

use App\User;
use App\Resturant;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResturantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the resturant.
     *
     * @param  \App\User  $user
     * @param  \App\Resturant  $resturant
     * @return mixed
     */
    public function view(User $user, Resturant $resturant)
    {
        //
    }

    /**
     * Determine whether the user can create resturants.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can update the resturant.
     *
     * @param  \App\User  $user
     * @param  \App\Resturant  $resturant
     * @return mixed
     */
    public function update(User $user, Resturant $resturant)
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can delete the resturant.
     *
     * @param  \App\User  $user
     * @param  \App\Resturant  $resturant
     * @return mixed
     */
    public function delete(User $user, Resturant $resturant)
    {
        //
        return $user->type === 'admin';
    }
}
