<?php

namespace App\Http\Controllers;

use App\DTOs\DepositDTO;
use App\Http\Requests\StoreDepositRequest;
use App\Models\Safe;
use App\Services\DepositService;

class DepositController extends Controller {

    public function __construct(
        private DepositService $depositService
    ) {}

    public function index(Safe $safe) {

        $this->authorize('viewAny', $safe);
    
        $deposits = $safe->deposits()->latest()->get();

        return view('deposit.history', compact('safe', 'deposits'));
    }

    public function create(Safe $safe) {

        $this->authorize('create', $safe);

        return view('deposit.create', compact('safe'));

    }

    public function store(StoreDepositRequest $request, Safe $safe) {

        $this->authorize('create', $safe);
        
        $dto = DepositDTO::fromArray(
            $request->validated(),
        );

        $this->depositService->store(safe: $safe, dto: $dto);

        return redirect()->route('safes.show', $safe)->with('success', 'Deposit Made');
    }

}
