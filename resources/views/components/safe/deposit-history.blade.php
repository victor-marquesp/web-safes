@props(['safe', 'deposits']);

<div class="card-header bg-white d-flex justify-content-between align-items-center">
    <h2 class="h6 mb-0">Histórico de depósitos</h2>

    @if ($safe->deposits()->count() > 5)
        <a href="{{ route('safes.history', $safe) }}" class="small">
            Ver histórico completo
        </a>
    @endif
</div>

<div class="card-body">
    <div>
        @forelse ($deposits as $deposit)
            <x-safe.deposit-history-item :deposit="$deposit" />
        @empty
            <x-ui.empty-state icon="bi-piggy-bank" title="Esse cofrinho ainda está vazio"
                description="Faça o primeiro depósito e comece a acompanhar o progresso.">
                <x-slot:action>
                    <a href="{{ route('deposits.create', $safe) }}" class="btn btn-ws-deposit">
                        <i class="bi bi-plus-circle-fill me-1" aria-hidden="true"></i>
                        Fazer o primeiro depósito
                    </a>
                </x-slot:action>
            </x-ui.empty-state>
        @endforelse
    </div>
</div>

