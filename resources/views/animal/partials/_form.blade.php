@props(['animal' => null])

<div class="mb-3">
    <label for="name" class="form-label">Nome do Animal</label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        class="form-control @error('name') is-invalid @enderror" 
        value="{{ old('name', $animal->name ?? '') }}" 
        required
    >
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="icon" class="form-label">Ícone / Imagem</label>
    <input 
        type="file" 
        name="icon" 
        id="icon" 
        class="form-control @error('icon') is-invalid @enderror"
        accept="image/*"
    >
    @error('icon')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    @if (isset($animal))
        <div class="mt-2">
            <small class="text-muted d-block mb-1">Ícone atual:</small>
            <img 
                src="{{ asset('storage/' . $animal->icon_path) }}" 
                alt="{{ $animal->name }}" 
                class="img-thumbnail"
                style="width: 80px; height: 80px; object-fit: cover;"
            >
        </div>
    @endif
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descrição (Opcional)</label>
    <textarea 
        name="description" 
        id="description" 
        rows="3" 
        class="form-control @error('description') is-invalid @enderror"
    >{{ old('description', $animal->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>