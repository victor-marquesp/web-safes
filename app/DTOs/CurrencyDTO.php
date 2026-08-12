<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

readonly class CurrencyDTO {

    private function __construct(
        public string $name,
        public ?UploadedFile $icon,
        public ?string $description
    ) {}

    public static function fromArray(array $data) : self {

        return new self(
            name: $data['name'],
            icon: $data['icon'] ?? null,
            description: $data['description'] ?? null
        );

    }
    
}