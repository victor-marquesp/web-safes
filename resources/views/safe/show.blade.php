<x-layouts.app>

    <x-slot:title>{{ $safe->name }}</x-slot>

    @php
        $deposits = $safe->deposits->sortByDesc('created_at')->take(5);
    @endphp

    <a href="{{ route('safes.index') }}" class="btn btn-outline-secondary btn-sm mb-3">
        <i class="bi bi-arrow-left" aria-hidden="true"></i> Voltar para cofrinhos
    </a>

    <div class="row g-4">
        <div class="col-12 col-lg-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    <x-ui.animal-icon :animal="$safe->animal" :size="110" class="mb-3" />

                    <h1 class="h4 mb-1">{{ $safe->name }}</h1>
                    <p class="text-muted small mb-3">{{ $safe->currency->name }}</p>

                    <div class="d-flex justify-content-center mb-3">
                        <x-ui.currency-amount
                            :value-cents="$safe->deposits->sum('value_cents')"
                            :currency="$safe->currency"
                            label="Saldo atual"
                            size="lg"
                        />
                    </div>

                    <p class="text-muted">
                        {{ $safe->description ?? 'Nenhuma descrição fornecida.' }}
                    </p>

                    <div class="d-grid gap-2 mt-3">
                        <a href="{{ route('deposits.create', $safe) }}" class="btn btn-ws-deposit">
                            <i class="bi bi-plus-circle-fill me-1" aria-hidden="true"></i> Depositar
                        </a>

                        <div class="d-flex gap-2">
                            <a href="{{ route('safes.edit', $safe) }}" class="btn btn-outline-secondary flex-fill">
                                <i class="bi bi-pencil me-1" aria-hidden="true"></i> Editar
                            </a>

                            <button
                                type="button"
                                class="btn btn-outline-danger flex-fill"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteSafeModal"
                            >
                                <i class="bi bi-trash me-1" aria-hidden="true"></i> Excluir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="card h-100">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h2 class="h6 mb-0">Histórico de depósitos</h2>

                    @if ($safe->deposits()->count() > 5)
                        <a href="{{ route('safes.history', $safe) }}" class="small">
                            Ver histórico completo
                        </a>
                    @endif
                </div>

                <div class="card-body">
                    @if ($deposits->isEmpty())
                        <x-ui.empty-state
                            icon="bi-piggy-bank"
                            title="Esse cofrinho ainda está vazio"
                            description="Faça o primeiro depósito e comece a acompanhar o progresso."
                        >
                            <x-slot:action>
                                <a href="{{ route('deposits.create', $safe) }}" class="btn btn-ws-deposit">
                                    <i class="bi bi-plus-circle-fill me-1" aria-hidden="true"></i>
                                    Fazer o primeiro depósito
                                </a>
                            </x-slot:action>
                        </x-ui.empty-state>
                    @else
                        <div>
                            @foreach ($deposits as $deposit)
                                <div class="ws-history-item">
                                    <div class="ws-history-item__icon">
                                        @if ($deposit->coin)
                                            <img
                                                src="{{ asset('storage/' . $deposit->coin->icon_path) }}"
                                                alt="{{ $deposit->coin->name }}"
                                            >
                                        @else
                                            <i class="bi bi-cash-stack" aria-hidden="true"></i>
                                        @endif
                                    </div>

                                    <div class="ws-history-item__main">
                                        <p class="ws-history-item__title">
                                            @if ($deposit->coin)
                                                {{ $deposit->quantity }}× {{ $deposit->coin->name }}
                                            @else
                                                Valor personalizado
                                            @endif
                                        </p>
                                        <p class="ws-history-item__meta mb-0">
                                            {{ $deposit->created_at->format('d/m/Y \à\s H:i') }}
                                        </p>
                                    </div>

                                    <div class="ws-history-item__value">
                                        {{ number_format($deposit->value_cents / 100, 2, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteSafeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir cofrinho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir <strong>{{ $safe->name }}</strong>?
                    @if ($deposits->isNotEmpty())
                        <div class="alert alert-warning mt-3 mb-0 py-2">
                            Esse cofrinho possui {{ $deposits->count() }}
                            {{ $deposits->count() === 1 ? 'depósito registrado' : 'depósitos registrados' }}.
                            Essa ação não pode ser desfeita.
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('safes.destroy', $safe) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
