@props(['icon' => 'bi-inbox', 'title', 'description' => null])

<div class="ws-empty-state">
    <div class="ws-empty-state__icon" aria-hidden="true">
        <i class="bi {{ $icon }}"></i>
    </div>

    <p class="ws-empty-state__title">{{ $title }}</p>

    @if ($description)
        <p class="mb-3">{{ $description }}</p>
    @endif

    @isset($action)
        <div class="mt-2">
            {{ $action }}
        </div>
    @endisset
</div>
