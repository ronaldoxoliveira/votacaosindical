<!doctype html>
<html lang="pt-br">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Votação - @yield('title')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <body>
        <div class="container">
            @yield('content')
            @include('layouts.message')
        </div>
    </body>
</html>
