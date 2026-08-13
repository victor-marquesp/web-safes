<?php

namespace App\Services;

use App\Models\Deposit;
use App\Models\Safe;
use App\DTOs\DepositDTO;

class DepositService {

    public function store(Safe $safe, DepositDTO $dto) : Deposit {

        return Deposit::create([
            'safe_id' => $safe->id,
            'coin_id' => $dto->coinId,
            'quantity' => $dto->quantity,
            'value_cents' => $dto->valueCents
        ]);

    }

}