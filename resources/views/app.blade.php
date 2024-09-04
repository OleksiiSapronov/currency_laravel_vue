<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Euro, dollar, currency, converter, online, converted, calculator, currency converter">
        <meta name="robots" content="index, follow">
        
        <title inertia>{{ config('app.name', 'AZconvert.com') }}</title>

        <!-- Fonts -->
         <!-- Removed unused font -->
         <!-- Preload the english font file for pacifico from app.css import -->
        <link rel="preload" href="https://fonts.gstatic.com/s/pacifico/v22/FwZY7-Qmy14u9lezJ-6K6MmBp0u-zK4.woff2" as="font" type="font/woff2" crossorigin="anonymous">


        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
