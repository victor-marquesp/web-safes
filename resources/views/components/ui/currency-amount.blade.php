@props(['valueCents', 'currency' => null, 'label' => null, 'size' => 'md'])

@php
    $formatted = number_format(($valueCents ?? 0) / 100, 2, ',', '.');
    $fontSize = $size === 'lg' ? '1.6rem' : ($size === 'sm' ? '0.95rem' : '1.15rem');
@endphp

<div>
    @if ($label)
        <small class="d-block text-uppercase text-muted" style="font-size: 0.7rem; letter-spacing: 0.04em;">
            {{ $label }}
        </small>
    @endif

    <span class="ws-amount" style="font-size: {{ $fontSize }}; font-weight: 600;">
        @if ($currency)
            <img src="{{ asset('storage/' . $currency->icon_path) }}" alt="{{ $currency->name }}">
        @endif
        {{ $formatted }}
        @if ($currency)
            <span class="text-muted" style="font-size: 0.7em; font-weight: 500;">{{ $currency->name }}</span>
        @endif
    </span>
</div>
