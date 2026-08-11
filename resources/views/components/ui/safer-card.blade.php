@props(['safer'])

<div class="card h-100 shadow-sm">
    <img 
        src="{{ asset('storage/' . $safer->animal->icon_path) }}" 
        class="card-img-top" 
        alt="Ícone do Cofrinho {{ $safer->name }}"
        style="height: 180px; object-fit: cover;"
    >

    <div class="card-body d-flex flex-column">
        <h5 class="card-title">{{ $safer->name }}</h5>
        <p class="card-text text-muted small flex-grow-1">
            {{ $safer->description ?? 'Sem descrição' }}
        </p>
        <a href="{{ route('safers.show', $safer->id) }}" class="btn btn-outline-primary w-100 mt-2">
            Mostrar
        </a>
    </div>
</div>