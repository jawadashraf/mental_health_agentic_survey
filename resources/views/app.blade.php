<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ c('seo.title') }}</title>

        <link data-n-head="ssr" rel="icon" type="image/x-icon" href="/favicon.ico">

        <!-- Scripts -->
        @vite(['resources/css/app.css'])
        @livewireStyles
    </head>
    <body class="antialiased">
        {{ $slot }}
        
        @livewireScripts
    </body>
</html>