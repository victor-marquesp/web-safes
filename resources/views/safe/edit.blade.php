<x-layouts.app>

    <x-slot:title>Editar {{ $safe->name }}</x-slot>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h1 class="h5 mb-0">Editar cofrinho</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('safes.update', $safe) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('safe.partials._form', ['safe' => $safe, 'animals' => $animals, 'currencies' => $currencies])

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('safes.show', $safe) }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-lg me-1" aria-hidden="true"></i> Salvar alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
