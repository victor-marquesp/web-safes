<?php

namespace App\DTOs;

readonly class SafeDTO {

    private function __construct(
        public string $name,
        public int $animalId,
        public int $currencyId,
        public ?string $description
    ) {}

    public static function fromArray(array $data) : self {

        return new self(
            name: $data['name'],
            animalId: $data['animal_id'],
            currencyId: $data['currency_id'],
            description: $data['description'] ?? null
        );

    }

    public function thisToArray() {

        return [
            'name' => $this->name,
            'animal_id' => $this->animalId,
            'currency_id' => $this->currencyId,
            'description' => $this->description
        ];

    }
}