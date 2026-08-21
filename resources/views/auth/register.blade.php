<x-layouts.app>
    <x-slot:title>Register</x-slot:title>

    <div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <x-ui.page-header title="Criar Conta"></x-ui.page-header>

            <div class="card">
            <div class="card-body">
            <form method="POST" action="/register" >
            @csrf

            <div class="mb-3">
            <label for="name" class="form-label" >Nome</label>
            <input type="text" name="name" id="name" class="form-control" required />
            </div>

            <div class="mb-3">
            <label for="email" class="form-label" >Email</label>
            <input type="email" name="email" id="email" placeholder="exemplo@provedor.com" class="form-control" required />
            </div>

            <div class="mb-3">
            <label for="password" class="form-label" >Senha</label>
            <input type="password" name="password" id="password" placeholder="min 8 caracteres" class="form-control" required />
            </div>

            <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
            <input type="password" name="password_confirmation" placeholder="confirmar" class="form-control" required />
            </div>
            
            
            <a href="{{ route('welcome') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Criar</button>

            <p>Já tem uma conta? <a href="{{ route('auth.login') }}">Entrar</a></p>

            </form>
            </div>
            </div>
    </div>
    </div>

</x-layouts.app>