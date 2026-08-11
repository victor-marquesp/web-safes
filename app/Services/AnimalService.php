<?php

namespace App\Services;

use App\DTOs\AnimalDTO;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage;

class AnimalService {

    public function create(AnimalDTO $dto) : Animal {

       
        $iconPath = $dto->icon->store('animals', 'public');

        return Animal::create([
            'name' => $dto->name,
            'description' => $dto->description,
            'icon_path' => $iconPath,
        ]);
    }

    public function update(Animal $animal, AnimalDTO $dto) : Animal {
        
        $data = [
            'name' => $dto->name,
            'description' => $dto->description,
        ];

        if ($dto->icon) {
            Storage::disk('public')->delete($animal->icon_path);

            $data['icon_path'] = $dto->icon->store('animals', 'public');
        }

        $animal->update($data);

        return $animal->refresh();
    }

    public function delete(Animal $animal) : void {

        Storage::disk('public')->delete($animal->icon_path);

        $animal->delete();
    }
    
}