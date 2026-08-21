<x-layouts.app>
    <x-slot:title>Login</x-slot:title>

    <div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <x-ui.page-header title="Entrar"></x-ui.page-header>

            <div class="card">
            <div class="card-body">
            <form method="POST" action="/login" >
            @csrf

            <div class="mb-3">
            <label for="email" class="form-label" >Email</label>
            <input type="email" name="email" id="email" placeholder="exemplo@provedor.com" class="form-control" required />
            </div>

            <div class="mb-3">
            <label for="password" class="form-label" >Senha</label>
            <input type="password" name="password" id="password" placeholder="min 8 caracteres" class="form-control" required />
            </div>
            
            <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Entrar</button>

            <p>Não tem uma conta? <a href="{{ route('auth.register') }}">Criar</a></p>
            
            </form>
            </div>
            </div>
    </div>
    </div>

</x-layouts.app>