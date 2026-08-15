@props(['safe' => null, 'animals', 'currencies'])

@php
    $isEditing = $safe && $safe->exists;
@endphp

<div class="mb-3">
    <label for="name" class="form-label">Nome do cofrinho <span class="text-danger">*</span></label>
    <input
        type="text"
        name="name"
        id="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $safe->name ?? '') }}"
        placeholder="Ex: Viagem dos sonhos"
        required
    >
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Mascote <span class="text-danger">*</span></label>
    <div class="row g-2">
        @foreach ($animals as $animal)
            <div class="col-4 col-sm-3 col-md-2">
                <input
                    type="radio"
                    name="animal_id"
                    id="animal_{{ $animal->id }}"
                    value="{{ $animal->id }}"
                    class="btn-check"
                    {{ (string) old('animal_id', $safe->animal_id ?? '') === (string) $animal->id ? 'checked' : '' }}
                    required
                >
                <label
                    for="animal_{{ $animal->id }}"
                    class="btn btn-outline-secondary w-100 h-100 d-flex flex-column align-items-center justify-content-center gap-1 py-2"
                    style="border-radius: var(--ws-radius-md);"
                >
                    <x-ui.animal-icon :animal="$animal" :size="44" />
                    <span class="small">{{ $animal->name }}</span>
                </label>
            </div>
        @endforeach
    </div>
    @error('animal_id')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="currency_id" class="form-label">Moeda <span class="text-danger">*</span></label>

    @if ($isEditing)
        <input type="text" class="form-control" value="{{ $safe->currency->name }}" disabled>
        <div class="form-text">A moeda de um cofrinho não pode ser alterada após a criação.</div>
    @else
        <select
            name="currency_id"
            id="currency_id"
            class="form-select @error('currency_id') is-invalid @enderror"
            required
        >
            <option value="" disabled {{ old('currency_id') ? '' : 'selected' }}>Selecione uma moeda...</option>
            @foreach ($currencies as $currency)
                <option
                    value="{{ $currency->id }}"
                    {{ (string) old('currency_id') === (string) $currency->id ? 'selected' : '' }}
                >
                    {{ $currency->name }}
                </option>
            @endforeach
        </select>
        @error('currency_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <div class="form-text">
            Não encontrou a moeda desejada? <a href="{{ route('currencies.create') }}">Cadastre uma nova moeda</a>.
        </div>
    @endif
</div>

<div class="mb-3">
    <label for="description" class="form-label">Descrição (opcional)</label>
    <textarea
        name="description"
        id="description"
        rows="3"
        class="form-control @error('description') is-invalid @enderror"
        placeholder="Para que é esse cofrinho?"
    >{{ old('description', $safe->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
