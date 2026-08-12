<?php

namespace App\Services;

use App\DTOs\CoinDTO;
use App\Models\Coin;

class CoinService {

    public function __construct(
        private FileStorageService $fileStorageService
    ) {}

    public function create(CoinDTO $dto) {

        $iconPath = $this->fileStorageService->store(file: $dto->icon, folder: 'coins', disk: 'public');

        return Coin::create([
            'name' => $dto->name,
            'currency_id' => $dto->currencyId,
            'value_cents' => $dto->valueCents,
            'icon_path' => $iconPath
        ]);

    }

    public function update(Coin $coin, CoinDTO $dto) : Coin {

        $iconPath = $coin->icon_path;

        if($dto->icon) {
            $iconPath = $this->fileStorageService->update(path: $iconPath, disk: 'public', file: $dto->icon, folder: 'coins');
        }

        $coin->update([
            'name' => $dto->name,
            'value_cents' =>$dto->valueCents,
            'icon_path' => $iconPath
        ]);

        return $coin->refresh();

    }

    public function delete(Coin $coin) : void {

        $this->fileStorageService->delete(path: $coin->icon_path, disk: 'public');

        $coin->delete();
    }

}