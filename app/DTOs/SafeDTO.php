<?php

namespace App\DTOs;

readonly class SafeDTO {

    private function __construct(
        public string $name,
        public int $animalId,
        public int $savings,
        public ?string $description
    ) {}

    public static function fromArray(array $data) : self {

        return new self(
            name: $data['name'],
            animalId: $data['animal_id'],
            savings: $data['savings'],
            description: $data['description'] ?? null
        );

    }

}