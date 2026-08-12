<?php

namespace App\Services;

use App\Models\Animal;
use App\DTOs\AnimalDTO;

class AnimalService {

    public function __construct(
        private FileStorageService $fileStorageService
    ) {}

    public function create(AnimalDTO $dto) : Animal {

        $iconPath = $this->fileStorageService->store(file: $dto->icon, folder: 'animals', disk: 'public');

        return Animal::create([
            'name' => $dto->name,
            'description' => $dto->description,
            'icon_path' => $iconPath,
        ]);
    }

    public function update(Animal $animal, AnimalDTO $dto) : Animal {

        $iconPath = $animal->icon_path;

        if($dto->icon) {
            $iconPath = $this->fileStorageService->update(path: $iconPath, disk: 'public', file: $dto->icon, folder: 'animals');
        }

        $animal->update([
            'name' => $dto->name,
            'description' => $dto->description,
            'icon_path' => $iconPath
        ]);

        return $animal->refresh();
    }

    public function delete(Animal $animal) : void {

        $this->fileStorageService->delete(path: $animal->icon_path, disk: 'public');

        $animal->delete();
    }
    
}