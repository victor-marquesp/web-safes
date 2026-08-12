<?php

namespace App\DTOs;

use Illuminate\Http\UploadedFile;

readonly class CoinDTO {

    private function __construct(
        public string $name,
        public int $currencyId,
        public int $valueCents,
        public ?UploadedFile $icon,
    ) {}

    public static function fromArray(array $data) : self {

        return new self(
            name: $data['name'],
            currencyId: $data['currency_id'],
            valueCents: $data['value_cents'],
            icon: $data['icon'] ?? null
        );

    }

}