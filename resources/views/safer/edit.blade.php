<x-layouts.app>
    <x-slot:title>Editar {{ $safer->name }}</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h1 class="h4 mb-0">Editar Cofrinho</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('safers.update', $safer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Inclui os campos reutilizáveis preenchidos --}}
                        @include('safer.partials._form', ['safer' => $safer])

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('safers.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Atualizar Cofrinho</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>