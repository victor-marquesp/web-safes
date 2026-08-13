<?php

namespace App\DTOs;

readonly class DepositDTO {

    private function __construct(
        public ?int $coinId,
        public ?int $quantity,
        public int $valueCents
    ) {}

    public static function fromArray(array $data) : self {

        return new self(
            coinId: $data['coin_id'] ?? null,
            quantity: $data['quantity'] ?? null,
            valueCents: $data['value_cents']
        );

    }

}