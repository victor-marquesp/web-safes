<x-layouts.app>
    <x-slot:title>Novo Cofrinho</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h1 class="h4 mb-0">Criar Novo Cofrinho</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('safers.store') }}" method="POST">
                        @csrf

                        {{-- Inclui os campos reutilizáveis --}}
                        @include('safer.partials._form', ['animals' => $animals])

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('safers.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Cofrinho</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>