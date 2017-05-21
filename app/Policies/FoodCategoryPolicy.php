<?php

namespace App\Policies;

use App\User;
use App\FoodCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class FoodCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the foodCategory.
     *
     * @param  \App\User  $user
     * @param  \App\FoodCategory  $foodCategory
     * @return mixed
     */
    public function view(User $user, FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Determine whether the user can create foodCategories.
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
     * Determine whether the user can update the foodCategory.
     *
     * @param  \App\User  $user
     * @param  \App\FoodCategory  $foodCategory
     * @return mixed
     */
    public function update(User $user, FoodCategory $foodCategory)
    {
        //
        return $user->type === 'admin';
    }

    /**
     * Determine whether the user can delete the foodCategory.
     *
     * @param  \App\User  $user
     * @param  \App\FoodCategory  $foodCategory
     * @return mixed
     */
    public function delete(User $user, FoodCategory $foodCategory)
    {
        //
        return $user->type === 'admin';
    }
}
