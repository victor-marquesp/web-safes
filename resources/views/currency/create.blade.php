<x-layouts.app :title="'Nova Moeda'">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('currencies.index') }}">Moedas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nova moeda</li>
        </ol>
    </nav>
    <h1 class="h3 mb-4">Nova moeda</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('currencies.store') }}" method="POST" enctype="multipart/form-data">
                @include('currency.partials._form')
            </form>
        </div>
    </div>
</x-layouts.app>