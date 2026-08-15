@csrf
@if(isset($currency) && $currency->exists)
    @method('PUT')
@endif

<div class="mb-3">
    <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $currency->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descrição</label>
    <textarea name="description" id="description" rows="3"
              class="form-control @error('description') is-invalid @enderror">{{ old('description', $currency->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="form-text">Campo opcional. Uma breve explicação sobre esta moeda.</div>
</div>

<div class="mb-4">
    <label for="icon" class="form-label">Ícone <span class="text-danger">*</span></label>

    @if(isset($currency) && $currency->exists && $currency->icon_path)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $currency->icon_path) }}" alt="Ícone atual"
                 width="56" height="56" class="rounded border p-1 bg-white">
        </div>
    @endif

    <input type="file" name="icon" id="icon" accept="image/*"
           class="form-control @error('icon_path') is-invalid @enderror"
           {{ isset($currency) && $currency->exists ? '' : 'required' }}>
    @error('icon_path')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="form-text">
        {{ isset($currency) && $currency->exists
            ? 'Envie um novo arquivo apenas se quiser substituir o ícone atual.'
            : 'PNG, JPG ou SVG. Será exibido nas listagens e cofres.' }}
    </div>
</div>

<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('currencies.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">
        {{ isset($currency) && $currency->exists ? 'Salvar alterações' : 'Criar moeda' }}
    </button>
</div>