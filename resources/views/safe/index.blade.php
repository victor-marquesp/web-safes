<x-layouts.app>

    <x-slot:title>Cofrinhos</x-slot>

    <x-ui.page-header title="Cofrinhos" subtitle="Seus cofrinhos virtuais, todos em um só lugar.">
        <x-slot:action>
            <a href="{{ route('safes.create') }}" class="btn btn-primary">
                Novo cofrinho
            </a>
        </x-slot:action>
    </x-ui.page-header>

    @if ($safes->isEmpty())
        <x-ui.empty-state
            icon="bi-piggy-bank"
            title="Você ainda não tem nenhum cofrinho"
            description="Crie o primeiro cofrinho e comece a guardar dinheiro."
        >
            <x-slot:action>
                <a href="{{ route('safes.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1" aria-hidden="true"></i> Criar meu primeiro cofrinho
                </a>
            </x-slot:action>
        </x-ui.empty-state>
    @else
        <div class="row g-4">
            @foreach ($safes as $safe)
                <div class="col-12 col-sm-6 col-lg-4">
                    <x-ui.safe-card :safe="$safe" />
                </div>
            @endforeach
        </div>
    @endif

</x-layouts.app>
