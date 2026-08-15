<x-layouts.app>
    <x-slot:title>Novo Animal</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h1 class="h4 mb-0">Cadastrar Novo Animal</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @include('animal.partials._form')

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('animals.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar Animal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>