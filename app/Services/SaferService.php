<?php

namespace App\Services;

use App\DTOs\SaferDTO;
use App\Models\Safer;

class SaferService {

    public function create(SaferDTO $dto) {

        return Safer::create([
            'name' => $dto->name,
            'animal_id' => $dto->animalId,
            'savings' => $dto->savings,
            'description' => $dto->description
        ]);

    }

    public function update(Safer $safer, SaferDTO $dto) {

        $safer->update([
            'name' => $dto->name,
            'animal_id' => $dto->animalId,
            'savings' => $dto->savings,
            'description' => $dto->description
        ]);

        return $safer->refresh();

    }

    public function delete(Safer $safer) {

        $safer->delete();

    }

}