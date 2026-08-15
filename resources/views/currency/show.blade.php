<x-layouts.app :title="$currency->name">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item"><a href="{{ route('currencies.index') }}">Moedas</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $currency->name }}</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-start mb-4">
        <div class="d-flex align-items-center gap-3">
            <img src="{{ asset('storage/' . $currency->icon_path) }}" alt="{{ $currency->name }}"
                 width="56" height="56" class="rounded border p-1 bg-white">
            <div>
                <h1 class="h3 mb-0">{{ $currency->name }}</h1>
                <div class="text-muted small">Criada em {{ $currency->created_at->format('d/m/Y') }}</div>
            </div>
        </div>
        <div class="btn-group">
            <a href="{{ route('currencies.edit', $currency) }}" class="btn btn-outline-secondary">Editar</a>
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

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="h6 text-uppercase text-muted mb-2">Descrição</h2>
            <p class="mb-0">{{ $currency->description ?: 'Nenhuma descrição cadastrada.' }}</p>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h2 class="h6 mb-0">Peças desta moeda</h2>
            <a href="{{ route('coins.create', ['currency_id' => $currency->id]) }}" class="btn btn-sm btn-primary">
                Nova peça
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">Ícone</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th class="text-end" style="width: 100px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($currency->coins as $coin)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $coin->icon_path) }}" alt="{{ $coin->name }}"
                                     width="28" height="28" class="rounded border p-1 bg-white">
                            </td>
                            <td>{{ $coin->name }}</td>
                            <td>{{ number_format($coin->value_cents / 100, 2, ',', '.') }} {{ $currency->name }}</td>
                            <td class="text-end">
                                <a href="{{ route('coins.show', $coin) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                Nenhuma peça cadastrada para esta moeda ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir moeda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir <strong>{{ $currency->name }}</strong>?
                    @if($currency->coins->count() > 0)
                        <div class="alert alert-warning mt-2 mb-0 py-2">
                            Esta moeda possui peças vinculadas. Verifique as dependências antes de excluir.
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('currencies.destroy', $currency) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>