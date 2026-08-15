@props(['title', 'subtitle' => null])

<div class="ws-page-header">
    <div>
        <h1 class="h3">{{ $title }}</h1>
        @if ($subtitle)
            <p class="text-muted mb-0">{{ $subtitle }}</p>
        @endif
    </div>

    @isset($action)
        <div>
            {{ $action }}
        </div>
    @endisset
</div>
