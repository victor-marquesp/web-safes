<?php

namespace App\Services;

use App\DTOs\CurrencyDTO;
use App\Models\Currency;
use Illuminate\Support\Facades\Storage;

class CurrencyService {

    public function create(CurrencyDTO $dto) : Currency {

        $iconPath = $dto->icon->store('currencies', 'public');

        return Currency::create([
            'name' => $dto->name,
            'description' => $dto->description,
            'icon_path' => $iconPath
        ]);

    }

    public function update(Currency $currency, CurrencyDTO $dto) : Currency {

        $iconPath = $currency->icon_path;

        if($dto->icon) {
            Storage::disk('public')->delete($currency->icon_path);

            $iconPath = $dto->icon->store('currencies', 'public');
        }

        $currency->update([
            'name' => $dto->name,
            'description' => $dto->description,
            'icon_path' => $iconPath
        ]);

        return $currency->refresh();

    }

    public function delete(Currency $currency) : void {

        Storage::disk('public')->delete($currency->icon_path);

        $currency->delete();
    }

}