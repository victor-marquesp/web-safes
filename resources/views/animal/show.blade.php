<x-layouts.app>
    <x-slot:title>{{ $animal->name }}</x-slot>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <img 
                        src="{{ asset('storage/' . $animal->icon_path) }}" 
                        class="rounded-circle mb-3" 
                        alt="{{ $animal->name }}"
                        style="width: 120px; height: 120px; object-fit: cover;"
                    >
                    <h1 class="h3 mb-2">{{ $animal->name }}</h1>
                    <p class="text-muted">{{ $animal->description ?? 'Sem descrição cadastrada.' }}</p>

                    <div class="d-flex justify-content-center gap-2 mt-4">
                        <a href="{{ route('animals.index') }}" class="btn btn-outline-secondary">
                            &larr; Voltar
                        </a>
                        <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este animal?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Cofrinhos associados a este animal --}}
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h2 class="h5 mb-0">Cofrinhos com este mascote</h2>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($animal->safers as $safer)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $safer->name }}</strong>
                                <small class="text-muted d-block">R$ {{ number_format($safer->savings, 2, ',', '.') }}</small>
                            </div>
                            <a href="{{ route('safers.show', $safer->id) }}" class="btn btn-sm btn-outline-primary">
                                Ver Cofrinho
                            </a>
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center py-3">
                            Nenhum cofrinho vinculado a este animal ainda.
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-layouts.app>