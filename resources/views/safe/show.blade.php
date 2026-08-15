<x-layouts.app>

    <x-slot:title>{{ $safe->name }}</x-slot>

    @php
        $balance = $safe->deposits->sum('value_cents');
        $deposits = $safe->deposits->sortByDesc('created_at')->take(5);
    @endphp

    <a href="{{ route('safes.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
        <i class="bi bi-arrow-left" aria-hidden="true"></i> Voltar para cofrinhos
    </a>

    <div class="row g-4">

        <div class="col-12 col-lg-4">
            <x-safe.safe-sumary :safe="$safe" :balance="$balance" />
        </div>

        <div class="col-12 col-lg-8 card h-100">
                <x-safe.deposit-history :safe="$safe" :deposits="$deposits" />
        </div>

    </div>

    <x-safe.delete-safe-modal :safe="$safe" :deposits="$safe->deposits" />

</x-layouts.app>
