<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Deposit;
use App\Models\Safe;
use Illuminate\Auth\Access\Response;

class DepositPolicy {

    public function viewAny(User $user, Safe $safe) : bool {

        return $user->id === $safe->user_id;

    }

    public function create(User $user, Safe $safe) : bool {

        return $user->id === $safe->user_id;

    }

}
