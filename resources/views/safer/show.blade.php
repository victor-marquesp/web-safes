<x-layouts.app>
    <x-slot:title>{{ $safer->name }}</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <img 
                    src="{{ asset('storage/' . $safer->animal->icon_path) }}" 
                    class="card-img-top" 
                    alt="{{ $safer->animal->name }}"
                    style="max-height: 250px; object-fit: cover;"
                >

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h1 class="h3 mb-0">{{ $safer->name }}</h1>
                        <span class="badge bg-success fs-6">
                            R$ {{ number_format($safer->savings, 2, ',', '.') }}
                        </span>
                    </div>

                    <p class="text-muted">
                        {{ $safer->description ?? 'Nenhuma descrição fornecida.' }}
                    </p>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('safers.index') }}" class="btn btn-outline-secondary">
                            &larr; Voltar
                        </a>

                        <div class="d-flex gap-2">
                            <a href="{{ route('safers.edit', $safer->id) }}" class="btn btn-warning">
                                Editar
                            </a>

                            <form action="{{ route('safers.destroy', $safer->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
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