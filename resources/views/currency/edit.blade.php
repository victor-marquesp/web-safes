<x-layouts.app :title="'Editar ' . $currency->name">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('currencies.index') }}">Moedas</a></li>
            <li class="breadcrumb-item"><a href="{{ route('currencies.show', $currency) }}">{{ $currency->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4">Editar moeda</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('currencies.update', $currency) }}" method="POST" enctype="multipart/form-data">
                @include('currency.partials._form')
            </form>
        </div>
    </div>
</x-layouts.app>