<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<x-header />

<body class="bg-orange-50">
    {{ $slot }}

    @vite('resources/js/app.js')

</body>


</html>