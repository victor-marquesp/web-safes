<x-layouts.app>

    <x-slot:title>Depositar em {{ $safe->name }}</x-slot>

    @php
        $currentBalance = $safe->deposits->sum('value_cents');
        $coins = $safe->currency->coins;
    @endphp

    <a href="{{ route('safes.show', $safe) }}" class="btn btn-outline-secondary btn-sm mb-3">
        <i class="bi bi-arrow-left" aria-hidden="true"></i> Voltar para o cofrinho
    </a>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card">
                {{-- <div class="card-header bg-white py-3 d-flex align-items-center gap-3">
                    <x-ui.animal-icon :animal="$safe->animal" :size="48" />
                    <div>
                        <h1 class="h5 mb-0">Depositar em {{ $safe->name }}</h1>
                        <p class="text-muted small mb-0">
                            Saldo atual: {{ number_format($currentBalance / 100, 2, ',', '.') }}
                            ({{ $safe->currency->name }})
                        </p>
                    </div>
                </div> --}}

                <div class="card-body">

                    @error('quantity')
                        <div class="alert alert-danger py-2">{{ $message }}</div>
                    @enderror

                    <form action="{{ route('deposits.store', $safe) }}" method="POST" id="deposit-form">
                        @csrf

                        <input type="hidden" name="coin_id" id="input-coin-id" value="">
                        <input type="hidden" name="quantity" id="input-quantity" value="">
                        <input type="hidden" name="value_cents" id="input-value-cents" value="">

                        {{-- <label class="form-label">Escolha uma moeda ou informe um valor</label> --}}

                        @if ($coins->isEmpty())
                            <div class="alert alert-warning">
                                Ainda não há moedas cadastradas para {{ $safe->currency->name }}.
                                Use a opção "Outro valor" abaixo, ou
                                <a href="{{ route('coins.create', ['currency_id' => $safe->currency_id]) }}">
                                    cadastre uma nova moeda
                                </a>.
                            </div>
                        @endif

                        <div class="ws-coin-grid mb-1" id="coin-grid">
                            @foreach ($coins as $coin)
                                <div
                                    class="ws-coin-card"
                                    data-type="coin"
                                    data-coin-id="{{ $coin->id }}"
                                    data-value-cents="{{ $coin->value_cents }}"
                                    tabindex="0"
                                    role="button"
                                    aria-pressed="false"
                                >
                                    <img
                                        src="{{ asset('storage/' . $coin->icon_path) }}"
                                        alt=""
                                        class="ws-coin-card__icon"
                                    >
                                    <p class="ws-coin-card__name mb-0">{{ $coin->name }}</p>
                                    <p class="ws-coin-card__value mb-0">
                                        {{ number_format($coin->value_cents / 100, 2, ',', '.') }}
                                    </p>

                                    <div class="ws-coin-card__qty">
                                        <button type="button" class="qty-minus" aria-label="Diminuir quantidade de {{ $coin->name }}">
                                            &minus;
                                        </button>
                                        <span class="qty-value">1</span>
                                        <button type="button" class="qty-plus" aria-label="Aumentar quantidade de {{ $coin->name }}">
                                            +
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                            <div
                                class="ws-coin-card ws-coin-card--custom"
                                data-type="custom"
                                tabindex="0"
                                role="button"
                                aria-pressed="false"
                            >
                                <div class="ws-coin-card__icon-glyph" aria-hidden="true">
                                    <i class="bi bi-pencil-fill"></i>
                                </div>
                                <p class="ws-coin-card__name mb-0">Outro valor</p>
                                <p class="ws-coin-card__value mb-0">Valor personalizado</p>

                                <div class="ws-custom-amount">
                                    <label for="custom-amount-input" class="visually-hidden">Valor personalizado</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">
                                            <img
                                                src="{{ asset('storage/' . $safe->currency->icon_path) }}"
                                                alt="{{ $safe->currency->name }}"
                                                style="width: 16px; height: 16px; border-radius: 50%; object-fit: cover;"
                                            >
                                        </span>
                                        <input
                                            type="text"
                                            inputmode="decimal"
                                            id="custom-amount-input"
                                            class="form-control"
                                            placeholder="0,00"
                                            autocomplete="off"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        @error('coin_id')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror
                        @error('value_cents')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror

                        <div class="ws-deposit-summary">
                            <div>
                                <div class="ws-deposit-summary__label">Você vai depositar</div>
                                <div class="d-flex align-items-baseline gap-2">
                                    <span class="ws-deposit-summary__value" id="summary-value">0,00</span>
                                    <span class="text-muted small">{{ $safe->currency->name }}</span>
                                </div>
                            </div>
                            <i class="bi bi-piggy-bank-fill" style="font-size: 1.8rem; color: var(--ws-gold);" aria-hidden="true"></i>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('safes.show', $safe) }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-ws-deposit" id="submit-btn" disabled>
                                <i class="bi bi-plus-circle-fill me-1" aria-hidden="true"></i>
                                <span id="submit-label">Depositar</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function () {
            var grid = document.getElementById('coin-grid');
            var cards = grid.querySelectorAll('.ws-coin-card');
            var inputCoinId = document.getElementById('input-coin-id');
            var inputQuantity = document.getElementById('input-quantity');
            var inputValueCents = document.getElementById('input-value-cents');
            var customInput = document.getElementById('custom-amount-input');
            var summaryValue = document.getElementById('summary-value');
            var submitBtn = document.getElementById('submit-btn');
            var submitLabel = document.getElementById('submit-label');

            var selected = null;
            var selectedCard = null;
            var quantity = 1;

            function formatCents(cents) {
                return (cents / 100).toLocaleString('pt-BR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }

            function clearSelection() {
                cards.forEach(function (card) {
                    card.classList.remove('is-selected');
                    card.setAttribute('aria-pressed', 'false');
                });
            }

            function updateSummary(valueCents) {
                if (valueCents > 0) {
                    summaryValue.textContent = formatCents(valueCents);
                    submitBtn.disabled = false;
                    submitLabel.textContent = 'Depositar ' + formatCents(valueCents);
                } else {
                    summaryValue.textContent = '0,00';
                    submitBtn.disabled = true;
                    submitLabel.textContent = 'Depositar';
                }
            }

            function selectCoin(card) {
                clearSelection();
                customInput.value = '';
                card.classList.add('is-selected');
                card.setAttribute('aria-pressed', 'true');
                selected = 'coin';
                selectedCard = card;
                quantity = 1;
                card.querySelector('.qty-value').textContent = quantity;

                var unitValue = parseInt(card.dataset.valueCents, 10);
                var totalValue = unitValue * quantity;

                inputCoinId.value = card.dataset.coinId;
                inputQuantity.value = quantity;
                inputValueCents.value = totalValue;

                updateSummary(totalValue);
            }

            function updateCoinQuantity(card, delta) {
                quantity = Math.max(1, quantity + delta);
                card.querySelector('.qty-value').textContent = quantity;

                var unitValue = parseInt(card.dataset.valueCents, 10);
                var totalValue = unitValue * quantity;

                inputQuantity.value = quantity;
                inputValueCents.value = totalValue;

                updateSummary(totalValue);
            }

            function selectCustom(card) {
                clearSelection();
                card.classList.add('is-selected');
                card.setAttribute('aria-pressed', 'true');
                selected = 'custom';
                selectedCard = card;

                inputCoinId.value = '';
                inputQuantity.value = '';
                inputValueCents.value = '';

                updateSummary(0);
                customInput.focus();
            }

            function parseCustomAmount(raw) {
                if (!raw) {
                    return 0;
                }
                var normalized = raw.replace(/\./g, '').replace(',', '.').replace(/[^\d.]/g, '');
                var value = parseFloat(normalized);
                if (isNaN(value) || value <= 0) {
                    return 0;
                }
                return Math.round(value * 100);
            }

            cards.forEach(function (card) {
                if (card.dataset.type === 'coin') {
                    card.addEventListener('click', function (event) {
                        if (event.target.closest('.qty-minus') || event.target.closest('.qty-plus')) {
                            return;
                        }
                        if (selected === 'coin' && selectedCard === card) {
                            return;
                        }
                        selectCoin(card);
                    });

                    card.addEventListener('keydown', function (event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                            event.preventDefault();
                            selectCoin(card);
                        }
                    });

                    var minus = card.querySelector('.qty-minus');
                    var plus = card.querySelector('.qty-plus');

                    minus.addEventListener('click', function (event) {
                        event.stopPropagation();
                        if (selected === 'coin' && selectedCard === card) {
                            updateCoinQuantity(card, -1);
                        }
                    });

                    plus.addEventListener('click', function (event) {
                        event.stopPropagation();
                        if (selected === 'coin' && selectedCard === card) {
                            updateCoinQuantity(card, 1);
                        }
                    });
                } else {
                    card.addEventListener('click', function (event) {
                        if (event.target.closest('#custom-amount-input')) {
                            return;
                        }
                        if (selected === 'custom' && selectedCard === card) {
                            return;
                        }
                        selectCustom(card);
                    });

                    card.addEventListener('keydown', function (event) {
                        if (event.key === 'Enter' || event.key === ' ') {
                            event.preventDefault();
                            selectCustom(card);
                        }
                    });
                }
            });

            customInput.addEventListener('input', function () {
                if (selected !== 'custom') {
                    return;
                }
                var cents = parseCustomAmount(customInput.value);
                inputValueCents.value = cents || '';
                updateSummary(cents);
            });

            document.getElementById('deposit-form').addEventListener('submit', function (event) {
                var valueCents = parseInt(inputValueCents.value || '0', 10);
                if (!valueCents || valueCents <= 0) {
                    event.preventDefault();
                }
            });
        })();
    </script>

</x-layouts.app>
