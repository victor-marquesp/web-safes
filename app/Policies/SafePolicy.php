<?php

namespace App\Policies;

use App\Models\Safe;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SafePolicy {

    public function viewAny(User $user) : bool {
        return true;
    }

    public function view(User $user, Safe $safe) : bool {
        
        return $user->id === $safe->user_id;

    }

    public function create(User $user): bool {
        return true;
    }

    public function update(User $user, Safe $safe) : bool {

        return $user->id === $safe->user_id;

    }

    public function delete(User $user, Safe $safe) : bool {

        return $user->id === $safe->user_id;

    }

}
