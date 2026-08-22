<?php

namespace App\Services;

use App\DTOs\DepositDTO;
use App\Enums\State;
use App\Exceptions\SafeBrokenException;
use App\Models\Deposit;
use App\Models\Safe;

class DepositService {

    public function store(Safe $safe, DepositDTO $dto) : Deposit {

        if($safe->state === State::BROKEN) {
            throw new SafeBrokenException('Safe Broken');
        }

        return Deposit::create([
            'safe_id' => $safe->id,
            'coin_id' => $dto->coinId,
            'quantity' => $dto->quantity,
            'value_cents' => $dto->valueCents
        ]);

    }

}