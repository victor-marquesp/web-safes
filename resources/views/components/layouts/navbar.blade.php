<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            WebSafes
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('safes.index') }}">Cofrinhos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('animals.index') }}">Animais</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('currencies.index') }}">Câmbios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('coins.index') }}">Moedas</a>
                </li>

            </ul>

        </div>

    </div>
</nav>