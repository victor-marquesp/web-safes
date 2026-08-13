<?php

namespace App\Http\Controllers;

use App\DTOs\DepositDTO;
use App\Http\Requests\StoreDepositRequest;
use App\Models\Deposit;
use App\Models\Safe;
use App\Services\DepositService;

class DepositController extends Controller {

    public function __construct(
        private DepositService $depositService
    ) {}

    public function index(Safe $safe) {
    
        $deposits = $safe->deposits()->latest()->get();

        return view('deposit.history', compact('deposits'));
    }

    public function create(Safe $safe) {

        return view('deposit.create', compact('safe'));

    }

    public function store(StoreDepositRequest $request, Safe $safe) {
        
        $dto = DepositDTO::fromArray(
            $request->validated(),
        );

        $this->depositService->store(safe: $safe, dto: $dto);

        return redirect()->route('deposit.history', $safe)->with('success', 'Deposit Made');
    }

    public function show(Deposit $deposit) {

        return view('deposit.show', compact('deposit'));

    }

}
