<?php

namespace App\Http\Controllers;

use App\DTOs\AnimalDTO;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Models\Animal;
use App\Services\AnimalService;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller {

    public function __construct(
        private AnimalService $animalService
    ) {}

    public function index() {

        $animals = Animal::all();

        return view('animal.index', compact('animals'));

    }

    public function create() {

        return view('animal.create');
        
    }

    public function store(StoreAnimalRequest $request) {

        $dto = AnimalDTO::fromArray(
            $request->validated()
        );

        $this->animalService->create($dto);

        return redirect()->route('animals.index')->with('success', 'Animal Created');
    }

    public function show(Animal $animal) {
        
        return view('animal.show', compact('animal'));

    }

    public function edit(Animal $animal) {

        return view('animal.edit', compact('animal'));

    }

    public function update(UpdateAnimalRequest $request, Animal $animal) {

        $dto = AnimalDTO::fromArray(
            $request->validated()
        );

        $this->animalService->update(animal: $animal, dto: $dto);

        return redirect()->route('animals.index')->with('success', 'Animal updated');
        
    }

    public function destroy(Animal $animal)
    {
        $this->animalService->delete($animal);

        return redirect()->route('animals.index')->with('success', 'Animal deleted');
    }
}
