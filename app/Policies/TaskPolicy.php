<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task)
    {
        return $user->id === $task->user_id;

    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Task $task)
    {
        return $user->id === $task->user_id;

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }

}
