<x-layouts.app>

    <x-slot:title>Bem-vindo</x-slot>

    <div class="ws-hero">
        <div class="ws-hero__mark" >
                <img src="{{ asset('favicon.png') }}" alt="WEB-SAFES"></i>
        </div>

        <h1 class="ws-hero__title">Bem-vindo ao WebSafes</h1>

        <p class="ws-hero__subtitle">
            Crie seu cofrinho e comece a guardar dinheiro,
            um depósito de cada vez.
        </p>

        @auth
            <a href="{{ route('safes.index') }}" class="btn btn-primary btn-lg px-4">
            <i class="bi bi-arrow-right-circle me-1" aria-hidden="true"></i> Ver meus cofrinhos
            </a>    
        @else
            <a href="{{ route('auth.register.form') }}" class="btn btn-primary btn-lg px-4">
            <i class="bi bi-person-fill-add me-1" aria-hidden="true"></i> Criar Conta
            </a>

            <a href="{{ route('auth.login.form') }}" class="btn btn-primary btn-lg px-4">
            <i class="bi bi-door-open-fill me-1" aria-hidden="true"></i> Entrar
            </a>  
        @endauth

        <div class="ws-hero__features">
            <div class="ws-hero__feature">
                <i class="bi bi-piggy-bank" aria-hidden="true"></i>
                <p class="ws-hero__feature-title">Escolha um mascote</p>
                <p class="ws-hero__feature-text mb-0">
                    Cada cofrinho ganha um animal e uma identidade própria.
                </p>
            </div>

            <div class="ws-hero__feature">
                <i class="bi bi-coin" aria-hidden="true"></i>
                <p class="ws-hero__feature-title">Deposite em moedas</p>
                <p class="ws-hero__feature-text mb-0">
                    Selecione moedas da sua Currency ou informe um valor personalizado.
                </p>
            </div>

            <div class="ws-hero__feature">
                <i class="bi bi-graph-up-arrow" aria-hidden="true"></i>
                <p class="ws-hero__feature-title">Acompanhe o progresso</p>
                <p class="ws-hero__feature-text mb-0">
                    Veja o histórico de depósitos e o saldo crescer com o tempo.
                </p>
            </div>
        </div>
    </div>

</x-layouts.app>
