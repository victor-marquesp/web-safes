<?php

namespace App\Services;

use App\DTOs\SafeDTO;
use App\Models\Safe;

use App\Enums\State;

class SafeService {

    public function create(SafeDTO $dto) {

        $safe = new Safe();

        $safe->fill($dto->thisToArray());
        $safe->user_id = auth()->id();

        return $safe->save();

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

    public function break(Safe $safe) {

        $safe->state = State::BROKEN;
        $safe->save();

    }

}