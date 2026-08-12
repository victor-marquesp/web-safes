<?php

namespace App\Services;

use App\DTOs\CurrencyDTO;
use App\Models\Currency;

class CurrencyService {

    public function __construct(
        private FileStorageService $fileStorageService
    ) {}

    public function create(CurrencyDTO $dto) : Currency {

        $iconPath = $this->fileStorageService->store(file: $dto->icon, folder: 'currencies', disk: 'public');

        return Currency::create([
            'name' => $dto->name,
            'description' => $dto->description,
            'icon_path' => $iconPath
        ]);

    }

    public function update(Currency $currency, CurrencyDTO $dto) : Currency {

        $iconPath = $currency->icon_path;

        if($dto->icon) {

            $iconPath = $this->fileStorageService->update(path: $iconPath, disk: 'public', file: $dto->icon, folder: 'currencies');

        }

        $currency->update([
            'name' => $dto->name,
            'description' => $dto->description,
            'icon_path' => $iconPath
        ]);

        return $currency->refresh();

    }

    public function delete(Currency $currency) : void {

        $this->fileStorageService->delete(path: $currency->icon_path, disk: 'public');

        $currency->delete();
    }

}