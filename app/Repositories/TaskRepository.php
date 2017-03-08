<?php

namespace App\Repositories;
use App\User;
use App\Task;



class TaskRepository
{
    /**
     * hent frem alle oppgavene til brukeren
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Task::with('user')->where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
