<nav class="navbar navbar-expand-lg ws-navbar" data-bs-theme="dark">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="ws-brand-mark">
                <img src="{{ asset('favicon.png') }}" alt="WEB-SAFES">
            </span>
            WebSafes
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Abrir menu de navegação"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-1">

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('safes.*') ? 'active' : '' }}"
                        href="{{ route('safes.index') }}"
                        @if (request()->routeIs('safes.*')) aria-current="page" @endif
                    >
                        <i class="bi bi-wallet2 me-1" aria-hidden="true"></i> Cofrinhos
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('animals.*') ? 'active' : '' }}"
                        href="{{ route('animals.index') }}"
                        @if (request()->routeIs('animals.*')) aria-current="page" @endif
                    >
                        <i class="bi bi-piggy-bank me-1" aria-hidden="true"></i> Animais
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('currencies.*') ? 'active' : '' }}"
                        href="{{ route('currencies.index') }}"
                        @if (request()->routeIs('currencies.*')) aria-current="page" @endif
                    >
                        <i class="bi bi-cash-coin me-1" aria-hidden="true"></i> Câmbios
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('coins.*') ? 'active' : '' }}"
                        href="{{ route('coins.index') }}"
                        @if (request()->routeIs('coins.*')) aria-current="page" @endif
                    >
                        <i class="bi bi-coin me-1" aria-hidden="true"></i> Moedas
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>
