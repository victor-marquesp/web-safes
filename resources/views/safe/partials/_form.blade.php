@props(['safe' => null, 'animals'])

<div class="mb-3">
    <label for="name" class="form-label">Nome do Cofrinho</label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        class="form-control @error('name') is-invalid @enderror" 
        value="{{ old('name', $safe->name ?? '') }}" 
        required
    >
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="savings" class="form-label">Valor Guardado (R$)</label>
    <input 
        type="number" 
        step="0.01" 
        name="savings" 
        id="savings" 
        class="form-control @error('savings') is-invalid @enderror" 
        value="{{ old('savings', $safe->savings ?? '0.00') }}" 
        required
    >
    @error('savings')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="animal_id" class="form-label">Mascote / Animal</label>
    <select name="animal_id" id="animal_id" class="form-select @error('animal_id') is-invalid @enderror" required>
        <option value="" disabled {{ old('animal_id', $safe->animal_id ?? '') ? '' : 'selected' }}>
            Selecione um animal...
        </option>
        @foreach ($animals as $animal)
            <option 
                value="{{ $animal->id }}" 
                {{ old('animal_id', $safe->animal_id ?? '') == $animal->id ? 'selected' : '' }}
            >
                {{ $animal->name }}
            </option>
        @endforeach
    </select>
    @error('animal_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descrição (Opcional)</label>
    <textarea 
        name="description" 
        id="description" 
        rows="3" 
        class="form-control @error('description') is-invalid @enderror"
    >{{ old('description', $safe->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>