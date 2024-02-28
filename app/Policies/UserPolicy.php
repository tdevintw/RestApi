<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $loggedInUser, User $user)
    {
        return $loggedInUser->id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $loggedInUser, User $user)
    {
        return $loggedInUser->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $loggedInUser, User $user)
    {
        return $loggedInUser->id === $user->id;
    }
}
