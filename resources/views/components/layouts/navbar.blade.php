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

            <ul class="navbar-nav mb-2 mb-lg-0 gap-lg-1">

                @auth                    
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('safes.*') ? 'active' : '' }}"
                        href="{{ route('safes.index') }}"
                        @if (request()->routeIs('safes.*')) aria-current="page" @endif
                    >
                        <i class="bi bi-wallet2 me-1" aria-hidden="true"></i> Cofrinhos
                    </a>
                </li>
                @endauth

                {{-- ----------------------------------------------------------------- --}}
                {{-- Admnistração --}}
                {{-- ----------------------------------------------------------------- --}}
                @if( auth()->user()?->is_admin )
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('animals.*') ? 'active' : '' }}"
                        href="{{ route('animals.index') }}"
                        @if (request()->routeIs('animals.*')) aria-current="page" @endif
                    >
                        <i class="bi bi-piggy-bank me-1" aria-hidden="true"></i> Animais
                    </a>
                </li>
                @endif

                @if( auth()->user()?->is_admin )
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('currencies.*') ? 'active' : '' }}"
                        href="{{ route('currencies.index') }}"
                        @if (request()->routeIs('currencies.*')) aria-current="page" @endif
                    >
                        <i class="bi bi-cash-coin me-1" aria-hidden="true"></i> Câmbios
                    </a>
                </li>
                @endif

                @if( auth()->user()?->is_admin )
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('coins.*') ? 'active' : '' }}"
                        href="{{ route('coins.index') }}"
                        @if (request()->routeIs('coins.*')) aria-current="page" @endif
                    >
                        <i class="bi bi-coin me-1" aria-hidden="true"></i> Moedas
                    </a>
                </li>
                @endif

            </ul>

            {{-- ----------------------------------------------------------------- --}}
            {{-- Autenticação --}}
            {{-- ----------------------------------------------------------------- --}}
            <ul class="navbar-nav ms-auto">
                @auth
                     <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="bi bi-person-circle me-1"></i>
                            {{ auth()->user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Sair
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </li>
                @else
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('auth.register.form') ? 'active' : '' }}"
                            href="{{ route('auth.register.form') }}"
                            @if (request()->routeIs('auth.register.form.*')) aria-current="page" @endif
                        >
                            <i class="bi bi-person-fill-add me-1" aria-hidden="true"></i> Criar Conta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('auth.login.form') ? 'active' : '' }}"
                            href="{{ route('auth.login.form') }}"
                            @if (request()->routeIs('auth.login.form.*')) aria-current="page" @endif
                        >
                            <i class="bi bi-door-open-fill me-1" aria-hidden="true"></i> Entrar
                        </a>
                    </li>
                @endauth

        </div>

    </div>
</nav>
