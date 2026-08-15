@props(['deposit'])

<div class="ws-history-item">
    <div class="ws-history-item__icon">
        @if ($deposit->coin)
            <img
                src="{{ asset('storage/' . $deposit->coin->icon_path) }}"
                alt="{{ $deposit->coin->name }}"
            >
        @else
            <i class="bi bi-cash-stack" aria-hidden="true"></i>
        @endif
    </div>

    <div class="ws-history-item__main">
        <p class="ws-history-item__title">
            @if ($deposit->coin)
                {{ $deposit->quantity }}× {{ $deposit->coin->name }}
            @else
                Valor personalizado
            @endif
        </p>
        <p class="ws-history-item__meta mb-0">
            {{ $deposit->created_at->format('d/m/Y \à\s H:i') }}
        </p>
    </div>

    <div class="ws-history-item__value">
        {{ number_format($deposit->value_cents / 100, 2, ',', '.') }}
    </div>
</div>