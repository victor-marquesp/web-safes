<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <title>{{ $title ?? 'WebSafers' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <x-layouts.navbar></x-layouts.navbar>

    <main class="container flex-grow-1 py-4">
        {{ $slot }}
    </main>

    <footer class="bg-white border-top py-3 text-center text-muted small mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} Victor Marques. Licensa livre.
        </div>
    </footer>

</body>
</html>