@props(['animal', 'size' => 64])

<img
    src="{{ asset('storage/' . $animal->icon_path) }}"
    alt="Mascote {{ $animal->name }}"
    width="{{ $size }}"
    height="{{ $size }}"
    style="width: {{ $size }}px; height: {{ $size }}px; object-fit: cover; border-radius: 50%; background-color: var(--ws-cream);"
    {{ $attributes }}
>
