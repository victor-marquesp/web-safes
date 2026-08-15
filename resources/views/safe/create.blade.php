<x-layouts.app>

    <x-slot:title>Novo cofrinho</x-slot>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h1 class="h5 mb-0">Criar novo cofrinho</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('safes.store') }}" method="POST">
                        @csrf

                        @include('safe.partials._form', ['animals' => $animals, 'currencies' => $currencies])

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('safes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-piggy-bank me-1" aria-hidden="true"></i> Criar cofrinho
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
