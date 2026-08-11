<x-layouts.app>
    <x-slot:title>Editar {{ $safe->name }}</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h1 class="h4 mb-0">Editar Cofrinho</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('safes.update', $safe->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Inclui os campos reutilizáveis preenchidos --}}
                        @include('safe.partials._form', ['safer' => $safe])

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('safes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Atualizar Cofrinho</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>