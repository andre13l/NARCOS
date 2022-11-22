<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolice {
    
    use HandlesAuthorization;


    /**
     * Checks if the user can update the profile
     */
    public function update(User $user, User $model) {
        return $user->id === $model->id;
    }

    /**
     * Checks if the user can delete the account
     */
    public function delete(User $user, User $model) {
        return $user->id === $model->id;
    }
}