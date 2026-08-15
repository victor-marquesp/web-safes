<x-layouts.app :title="$coin->name">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('coins.index') }}">Peças</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $coin->name }}</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-start mb-4">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('storage/' . $coin->icon_path) }}" alt="{{ $coin->name }}"
                 width="56" height="56" class="rounded border p-1 bg-white">
            <div>
                <h1 class="h3 mb-0">{{ $coin->name }}</h1>
                <div class="text-muted small">Criada em {{ $coin->created_at->format('d/m/Y') }}</div>
            </div>
        </div>
        <div class="btn-group">
            <a href="{{ route('coins.edit', $coin) }}" class="btn btn-outline-secondary">Editar</a>
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Excluir
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Moeda</dt>
                <dd class="col-sm-9">
                    <a href="{{ route('currencies.show', $coin->currency) }}">{{ $coin->currency->name }}</a>
                </dd>

                <dt class="col-sm-3">Valor</dt>
                <dd class="col-sm-9">
                    {{ number_format($coin->value_cents / 100, 2, ',', '.') }} {{ $coin->currency->name }}
                    <span class="text-muted">({{ $coin->value_cents }} centavos)</span>
                </dd>
            </dl>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir peça</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir <strong>{{ $coin->name }}</strong>? Essa ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('coins.destroy', $coin) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>