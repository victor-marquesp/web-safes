@props(['safe'])

<div class="modal fade" id="breakSafeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quebrar cofrinho</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja quebrar <strong>"{{ $safe->name }}"</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('safes.break', $safe) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger">Quebrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
