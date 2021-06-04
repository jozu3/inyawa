<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Imprimir')</title>

        <!-- Styles -->
        
        <link rel="stylesheet" href="{{ config('app.url', 'http://localhost') }}/vendor/adminlte/dist/css/adminlte.min.css">

        @livewireStyles

        <!-- Scripts -->
        @yield('styles')

        <!-- Scripts -->

    </head>
    <body class="font-sans antialiased">
   	    @yield('content')
        @livewireScripts
    </body>
</html>
