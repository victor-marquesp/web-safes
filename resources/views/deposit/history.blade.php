<x-layouts.app>

    <x-slot:title>Histórico — {{ $safe->name }}</x-slot>

    <a href="{{ route('safes.show', $safe) }}" class="btn btn-outline-secondary btn-sm mb-3">
        <i class="bi bi-arrow-left" aria-hidden="true"></i> Voltar para o cofrinho
    </a>

    <x-ui.page-header
        :title="'Histórico de ' . $safe->name"
        subtitle="Todos os depósitos registrados neste cofrinho."
    >

        @if($safe->state === App\Enums\State::INTACT)
            <x-slot:action>
                <a href="{{ route('deposits.create', $safe) }}" class="btn btn-ws-deposit">
                    <i class="bi bi-plus-circle-fill me-1" aria-hidden="true"></i> Depositar
                </a>
            </x-slot:action>
        @endif
    </x-ui.page-header>

    <div class="card">
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

</x-layouts.app>
