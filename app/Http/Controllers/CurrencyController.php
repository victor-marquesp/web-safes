<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

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

        Gate::authorize('is-admin');

        $currencies = Currency::all();

        return view('currency.index', compact('currencies'));
    }

    public function create() {

        Gate::authorize('is-admin');

        return view('currency.create');
    }

    public function store(StoreCurrencyRequest $request) {

        Gate::authorize('is-admin');

        $dto = CurrencyDTO::fromArray(
            $request->validated()
        );


        $this->currencyService->create($dto);

        return redirect()->route('currencies.index')->with('success', 'Currency Created');
    }

    public function show(Currency $currency) {

        Gate::authorize('is-admin');

        return view('currency.show', compact('currency'));
    }

    public function edit(Currency $currency) {

        Gate::authorize('is-admin');

        return view('currency.edit', compact('currency'));
    }

    public function update(UpdateCurrencyRequest $request, Currency $currency) {

        Gate::authorize('is-admin');
        
        $dto = CurrencyDTO::fromArray(
            $request->validated()
        );

        $this->currencyService->update(currency: $currency,  dto: $dto);

        return redirect()->route('currencies.index')->with('success', 'Currency Updated');
    }

    public function destroy(Currency $currency) {

        Gate::authorize('is-admin');

        $this->currencyService->delete($currency);

        return redirect()->route('currencies.index')->with('success', 'Currency Deleted');
    }
}
