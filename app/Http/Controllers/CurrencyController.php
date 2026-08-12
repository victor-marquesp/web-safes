<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\CurrencyService;
use App\DTOs\CurrencyDTO;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;

class CurrencyController extends Controller {

    public function __construct(
        private CurrencyService $currencyService
    ) {}

    public function index() {
        $currencies = Currency::all();

        return view('currency.index', compact('currencies'));
    }

    public function create() {
        return view('currency.create');
    }

    public function store(StoreCurrencyRequest $request) {

        $dto = CurrencyDTO::fromArray(
            $request->validated()
        );


        $this->currencyService->create($dto);

        return redirect()->route('currencies.index')->with('success', 'Currency Created');
    }

    public function show(Currency $currency) {
        return view('currency.show', compact('currency'));
    }

    public function edit(Currency $currency) {
        return view('currency.edit', compact('currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency) {
        
        $dto = CurrencyDTO::fromArray(
            $request->validated()
        );

        $this->currencyService->update(currency: $currency,  dto: $dto);

        return redirect()->route('currencies.index')->with('success', 'Currency Updated');
    }

    public function destroy(Currency $currency) {
        $this->currencyService->delete($currency);

        return redirect()->route('currencies.index')->with('success', 'Currency Deleted');
    }
}
