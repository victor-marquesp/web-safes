<?php

namespace App\Http\Controllers;

use App\DTOs\SafeDTO;
use App\Http\Requests\StoreSafeRequest;
use App\Http\Requests\UpdateSafeRequest;
use App\Models\Animal;
use App\Models\Currency;
use App\Models\Safe;
use App\Services\SafeService;

class SafeController extends Controller {

    public function __construct(
        private SafeService $safeService
    ) {}

    public function index() {
        
        $safes = Safe::withSum('deposits', 'value_cents')->get();

        return view('safe.index', compact('safes'));
    }

    public function create() {

        $animals = Animal::all();
        $currencies = Currency::all();

        return view('safe.create', compact(['animals', 'currencies']));
    }

    public function store(StoreSafeRequest $request) {
        
        $dto = SafeDTO::fromArray(
            $request->validated()
        );

        $this->safeService->create($dto);

        return redirect()->route('safes.index')->with('success', 'Safe created');

    }

    public function show(Safe $safe) {

        return view('safe.show', compact('safe'));

    }

    public function edit(Safe $safe) {

        $animals = Animal::all();
        $currencies = Currency::all();

        return view('safe.edit', compact(['safe', 'animals', 'currencies']));

    }

    public function update(UpdateSafeRequest $request, Safe $safe) {
        
        $dto = SafeDTO::fromArray(
            $request->validated()
        );

        $this->safeService->update(safe: $safe, dto: $dto);

        return redirect()->route('safes.index')->with('success', 'Safe created');

    }

    public function destroy(Safe $safe) {
        
        $this->safeService->delete($safe);

        return redirect()->route('safes.index')->with('success', 'Safe deleted');

    }
}
