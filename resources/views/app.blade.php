<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Euro, dollar, currency, converter, online, converted, calculator, currency converter">
        <meta name="robots" content="index, follow">
        <meta property="og:title" content="Convert US Dollar (USD), Exchange Rates Today">
        <meta name="description" content="AZconvert.com is a very useful and convenient currency converter and calculator. You can quickly check the current exchange rates from any country in the world. EUR to USD, USD to GBP, EUR to GBP or INR to USD.">
        
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.ts', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
