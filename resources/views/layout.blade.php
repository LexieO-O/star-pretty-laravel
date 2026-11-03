<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Star Pretty Cosmetics')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.menu')

    @yield('conteudo')

    @include('partials.footer')

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
