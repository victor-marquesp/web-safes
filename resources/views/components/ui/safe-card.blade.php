@props(['safe'])

@php
    $balance = $safe->deposits->sum('value_cents');
@endphp

<div class="card ws-safe-card position-relative">

    <a
        href="{{ route('safes.show', $safe) }}"
        class="ws-safe-card__link stretched-link"
        aria-label="Ver detalhes do cofrinho {{ $safe->name }}"
    >
        <div class="ws-safe-card__icon-wrap">
            <x-ui.animal-icon :animal="$safe->animal" :size="84" class="ws-safe-card__icon" />
        </div>

        <div class="ws-safe-card__body">
            <p class="ws-safe-card__name">{{ $safe->name }}</p>
            <p class="ws-safe-card__currency">{{ $safe->currency->name }}</p>

            <div class="ws-safe-card__balance">
                <small>Saldo atual</small>
                {{ number_format($balance / 100, 2, ',', '.') }}
            </div>
        </div>
    </a>

    <div class="px-3 pb-3">
        <a
            href="{{ route('deposits.create', $safe) }}"
            class="btn btn-ws-deposit w-100 position-relative ws-safe-card__deposit-btn"
            style="z-index: 2;"
        >
            <i class="bi bi-plus-circle-fill me-1" aria-hidden="true"></i> Depositar
        </a>
    </div>
</div>
