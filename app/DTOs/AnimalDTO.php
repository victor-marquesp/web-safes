<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

readonly class AnimalDTO {

    private function __construct(
        public string $name,
        public ?UploadedFile $icon,
        public ?string $description
    ) {}

    public static function fromArray(array $data) : self {

        return new self(
            name: $data['name'],
            description: $data['description'] ?? null,
            icon: $data['icon'] ?? null,
        );

    }

}