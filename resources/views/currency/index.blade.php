<x-layouts.app :title="'Moedas'">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Moedas</h1>
        <a href="{{ route('currencies.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nova moeda
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">Ícone</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th class="text-center" style="width: 140px;">Peças</th>
                        <th class="text-end" style="width: 160px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($currencies as $currency)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/' . $currency->icon_path) }}" alt="{{ $currency->name }}"
                                     width="32" height="32" class="rounded border p-1 bg-white">
                            </td>
                            <td>
                                <a href="{{ route('currencies.show', $currency) }}" class="text-decoration-none fw-semibold">
                                    {{ $currency->name }}
                                </a>
                            </td>
                            <td class="text-muted">
                                {{ $currency->description ? \Illuminate\Support\Str::limit($currency->description, 60) : '—' }}
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary-subtle text-secondary-emphasis">
                                    {{ $currency->coins_count ?? $currency->coins()->count() }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('currencies.show', $currency) }}" class="btn btn-outline-secondary" title="Ver">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('currencies.edit', $currency) }}" class="btn btn-outline-secondary" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger" title="Excluir"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $currency->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <div class="modal fade" id="deleteModal{{ $currency->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Excluir moeda</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                            </div>
                                            <div class="modal-body">
                                                Tem certeza que deseja excluir <strong>{{ $currency->name }}</strong>?
                                                @if(($currency->coins_count ?? $currency->coins()->count()) > 0)
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Nenhuma moeda cadastrada ainda. <a href="{{ route('currencies.create') }}">Criar a primeira moeda</a>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if(method_exists($currencies, 'links'))
        <div class="mt-3">
            {{ $currencies->links() }}
        </div>
    @endif
</x-layouts.app>