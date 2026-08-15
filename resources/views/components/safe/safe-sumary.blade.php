@props(['safe', 'balance'])

<div class="card h-100">
    <div class="card-body text-center">
        <x-ui.animal-icon :animal="$safe->animal" :size="110" class="mb-3" />

        <h1 class="h4 mb-1">{{ $safe->name }}</h1>
        <p class="text-muted small mb-3">{{ $safe->currency->name }}</p>

        <div class="d-flex justify-content-center mb-3">
            <x-ui.currency-amount :value-cents="$balance" :currency="$safe->currency" label="Saldo atual" size="lg" />
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

                <button type="button" class="btn btn-outline-danger flex-fill" data-bs-toggle="modal"
                    data-bs-target="#deleteSafeModal">
                    <i class="bi bi-trash me-1" aria-hidden="true"></i> Excluir
                </button>
            </div>
        </div>
    </div>
</div>
