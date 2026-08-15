<x-layouts.app :title="'Peças'">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Peças</h1>
        <a href="{{ route('coins.create') }}" class="btn btn-primary">
            Nova peça
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    <form method="GET" action="{{ route('coins.index') }}" class="row g-2 mb-3">
        <div class="col-auto">
            <select name="currency_id" class="form-select" onchange="this.form.submit()">
                <option value="">Todas as moedas</option>
                @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}" {{ (string) request('currency_id') === (string) $currency->id ? 'selected' : '' }}>
                        {{ $currency->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @if(request('currency_id'))
            <div class="col-auto">
                <a href="{{ route('coins.index') }}" class="btn btn-outline-secondary">Limpar filtro</a>
            </div>
        @endif
    </form>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">Ícone</th>
                        <th>Nome</th>
                        <th>Moeda</th>
                        <th>Valor</th>
                        <th class="text-end" style="width: 160px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coins as $coin)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $coin->icon_path) }}" alt="{{ $coin->name }}"
                                     width="32" height="32" class="rounded border p-1 bg-white">
                            </td>
                            <td>
                                <a href="{{ route('coins.show', $coin) }}" class="text-decoration-none fw-semibold">
                                    {{ $coin->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('currencies.show', $coin->currency) }}" class="text-decoration-none">
                                    {{ $coin->currency->name }}
                                </a>
                            </td>
                            <td>{{ number_format($coin->value_cents / 100, 2, ',', '.') }} <span class="text-muted small">{{ $coin->currency->name }}</span></td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('coins.show', $coin) }}" class="btn btn-outline-secondary" title="Ver">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('coins.edit', $coin) }}" class="btn btn-outline-secondary" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger" title="Excluir"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $coin->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <div class="modal fade" id="deleteModal{{ $coin->id }}" tabindex="-1" aria-hidden="true">
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Nenhuma peça cadastrada ainda. <a href="{{ route('coins.create') }}">Criar a primeira peça</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if(method_exists($coins, 'links'))
        <div class="mt-3">
            {{ $coins->links() }}
        </div>
    @endif
</x-layouts.app>