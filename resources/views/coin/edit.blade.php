<x-layouts.app :title="'Editar ' . $coin->name">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('coins.index') }}">Peças</a></li>
            <li class="breadcrumb-item"><a href="{{ route('coins.show', $coin) }}">{{ $coin->name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4">Editar peça</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('coins.update', $coin) }}" method="POST" enctype="multipart/form-data">
                @include('coin.partials._form')
            </form>
        </div>
    </div>
</x-layouts.app>