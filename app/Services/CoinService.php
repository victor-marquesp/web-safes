<?php

namespace App\Services;

use App\DTOs\CoinDTO;
use App\Models\Coin;
use Illuminate\Support\Facades\Storage;

class CoinService {

    public function create(CoinDTO $dto) {

        $iconPath = $dto->icon->store('coins', 'public');

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
            Storage::disk('public')->delete($coin->icon_path);

            $iconPath = $dto->icon->store('coins', 'public');
        }

        $coin->update([
            'name' => $dto->name,
            'value_cents' =>$dto->valueCents,
            'icon_path' => $iconPath
        ]);

        return $coin->refresh();

    }

    public function delete(Coin $coin) : void {

        Storage::disk('public')->delete($coin->icon_path);

        $coin->delete();
    }

}