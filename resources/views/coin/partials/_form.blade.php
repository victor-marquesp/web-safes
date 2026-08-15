@csrf
@if(isset($coin) && $coin->exists)
    @method('PUT')
@endif

<div class="mb-3">
    <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $coin->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="currency_id" class="form-label">Moeda <span class="text-danger">*</span></label>
    <select name="currency_id" id="currency_id"
            class="form-select @error('currency_id') is-invalid @enderror" required>
        <option value="">Selecione uma moeda...</option>
        @foreach($currencies as $currency)
            <option value="{{ $currency->id }}"
                {{ (string) old('currency_id', $coin->currency_id ?? request('currency_id')) === (string) $currency->id ? 'selected' : '' }}>
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
</div>

<div class="mb-3">
    <label for="value_cents" class="form-label">Valor, em centavos <span class="text-danger">*</span></label>
    <input type="number" name="value_cents" id="value_cents" min="1" step="1"
           class="form-control @error('value_cents') is-invalid @enderror"
           style="max-width: 220px;"
           value="{{ old('value_cents', $coin->value_cents ?? '') }}" required>
    @error('value_cents')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
    <div class="form-text">
        Equivale a <strong id="value_preview">0,00</strong> na moeda selecionada. Ex.: 150 = 1,50.
    </div>
</div>

<div class="mb-4">
    <label for="icon" class="form-label">Ícone <span class="text-danger">*</span></label>

    @if(isset($coin) && $coin->exists && $coin->icon_path)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $coin->icon_path) }}" alt="Ícone atual"
                 width="48" height="48" class="rounded border p-1 bg-white">
        </div>
    @endif

    <input type="file" name="icon" id="icon" accept="image/*"
           class="form-control @error('icon_path') is-invalid @enderror"
           {{ isset($coin) && $coin->exists ? '' : 'required' }}>
    @error('icon_path')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <div class="form-text">
        {{ isset($coin) && $coin->exists
            ? 'Envie um novo arquivo apenas se quiser substituir o ícone atual.'
            : 'PNG, JPG ou SVG.' }}
    </div>
</div>

<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('coins.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">
        {{ isset($coin) && $coin->exists ? 'Salvar alterações' : 'Criar peça' }}
    </button>
</div>

<script>
    (function () {
        const input = document.getElementById('value_cents');
        const preview = document.getElementById('value_preview');

        function updatePreview() {
            const cents = parseInt(input.value || '0', 10) || 0;
            preview.textContent = (cents / 100).toLocaleString('pt-BR', { minimumFractionDigits: 2 });
        }

        input.addEventListener('input', updatePreview);
        updatePreview();
    })();
</script>