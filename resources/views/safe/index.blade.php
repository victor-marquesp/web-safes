<x-layouts.app>

    <x-slot:title>Cofrinhos</x-slot>

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Cofrinhos</h1>
            <a href="{{ route('safes.create') }}" class="btn btn-primary">Novo Cofrinho</a>
        </div>

        <div class="row g-4">
            @forelse ($safes as $safe)
                <div class="col-12 col-sm-6 col-md-4">
                    <x-ui.safe-card :safe="$safe" />
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <p>Nenhum cofrinho encontrado.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>