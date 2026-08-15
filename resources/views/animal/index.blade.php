<x-layouts.app>
    <x-slot:title>Animais</x-slot>

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Animais / Mascotes</h1>
            <a href="{{ route('animals.create') }}" class="btn btn-primary">Novo Animal</a>
        </div>

        <div class="row g-4">
            @forelse ($animals as $animal)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm text-center">
                        <div class="p-3">
                            <img 
                                src="{{ asset('storage/' . $animal->icon_path) }}" 
                                class="rounded-circle img-fluid" 
                                alt="{{ $animal->name }}"
                                style="width: 100px; height: 100px; object-fit: cover;"
                            >
                        </div>
                        <div class="card-body d-flex flex-column pt-0">
                            <h5 class="card-title">{{ $animal->name }}</h5>
                            <p class="card-text text-muted small flex-grow-1">
                                {{ \Illuminate\Support\Str::limit($animal->description ?? 'Sem descrição', 60) }}
                            </p>
                            <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-outline-primary btn-sm w-100 mt-2">
                                Ver Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <p>Nenhum animal cadastrado ainda.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>