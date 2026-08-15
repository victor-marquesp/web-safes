@props(['safe', 'deposits'])

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
