<x-layouts.app>
    <x-slot:title>{{ $safe->name }}</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <img 
                    src="{{ asset('storage/' . $safe->animal->icon_path) }}" 
                    class="card-img-top" 
                    alt="{{ $safe->animal->name }}"
                    style="max-height: 250px; object-fit: cover;"
                >

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h1 class="h3 mb-0">{{ $safe->name }}</h1>
                        <span class="badge bg-success fs-6">
                            R$ {{ number_format($safe->savings, 2, ',', '.') }}
                        </span>
                    </div>

                    <p class="text-muted">
                        {{ $safe->description ?? 'Nenhuma descrição fornecida.' }}
                    </p>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('safes.index') }}" class="btn btn-outline-secondary">
                            &larr; Voltar
                        </a>

                        <div class="d-flex gap-2">
                            <a href="{{ route('safes.edit', $safe->id) }}" class="btn btn-warning">
                                Editar
                            </a>

                            <form action="{{ route('safes.destroy', $safe->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>