<?php

namespace App\Services;

use App\DTOs\SafeDTO;
use App\Models\Safe;

class SafeService {

    public function create(SafeDTO $dto) {

        return Safe::create([
            'name' => $dto->name,
            'animal_id' => $dto->animalId,
            'currency_id' => $dto->currencyId,
            'description' => $dto->description
        ]);

    }

    public function update(Safe $safe, SafeDTO $dto) {

        $safe->update([
            'name' => $dto->name,
            'animal_id' => $dto->animalId,
            'description' => $dto->description
        ]);

        return $safe->refresh();

    }

    public function delete(Safe $safe) {

        $safe->delete();

    }

}