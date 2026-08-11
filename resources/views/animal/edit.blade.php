<x-layouts.app>
    <x-slot:title>Editar {{ $animal->name }}</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h1 class="h4 mb-0">Editar Animal</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @include('animal.partials._form', ['animal' => $animal])

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('animals.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Atualizar Animal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>