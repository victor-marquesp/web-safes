<?php

namespace App\Http\Controllers;

use App\DTOs\SaferDTO;
use App\Http\Requests\StoreSaferRequest;
use App\Http\Requests\UpdateSaferRequest;
use App\Models\Animal;
use App\Models\Safer;
use App\Services\SaferService;

class SaferController extends Controller {

    public function __construct(
        private SaferService $saferService
    ) {}

    public function index() {
        
        $safers = Safer::all();

        return view('safer.index', compact('safers'));
    }

    public function create() {

        $animals = Animal::all();

        return view('safer.create', compact('animals'));
    }

    public function store(StoreSaferRequest $request) {
        
        $dto = SaferDTO::fromArray(
            $request->validated()
        );

        $this->saferService->create($dto);

        return redirect()->route('safers.index')->with('success', 'Safer created');

    }

    public function show(Safer $safer) {

        return view('safer.show', compact('safer'));

    }

    public function edit(Safer $safer) {

        $animals = Animal::all();

        return view('safer.edit', compact(['safer', 'animals']));

    }

    public function update(UpdateSaferRequest $request, Safer $safer) {
        
        $dto = SaferDTO::fromArray(
            $request->validated()
        );

        $this->saferService->update(safer: $safer, dto: $dto);

        return redirect()->route('safers.index')->with('success', 'Safer created');

    }

    public function destroy(Safer $safer) {
        
        $this->saferService->delete($safer);

        return redirect()->route('safers.index')->with('success', 'Safer deleted');

    }
}
