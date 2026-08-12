<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Services\CoinService;
use App\DTOs\CoinDTO;
use App\Http\Requests\StoreCoinRequest;
use App\Http\Requests\UpdateCoinRequest;

class CoinController extends Controller {

    public function __construct(
        private CoinService $coinService
    ) {}

    public function index() {
        $coins = Coin::all();

        return view('coin.index', compact('coins'));
    }

    public function create() {
        return view('coin.create');
    }

    public function store(StoreCoinRequest $request) {

        $dto = CoinDTO::fromArray(
            $request->validated()
        );

        $this->coinService->create($dto);

        return redirect()->route('coins.index')->with('success', 'Coin Created');
    }

    public function show(Coin $coin) {
        return view('coin.show', compact('coin'));
    }

    public function edit(Coin $coin) {
        return view('coin.edit', compact('coin'));
    }

    public function update(UpdateCoinRequest $request, Coin $coin) {
        
        $dto = CoinDTO::fromArray(
            $request->validated()
        );

        $this->coinService->update(coin: $coin,  dto: $dto);

        return redirect()->route('coins.index')->with('success', 'Coin Updated');
    }

    public function destroy(Coin $coin) {
        $this->coinService->delete($coin);

        return redirect()->route('coins.index')->with('success', 'Coin Deleted');
    }
}
