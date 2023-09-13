<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <x-layout.seo :model="$seoModel ?? null" />
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="
    bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-orange-50 via-orange-100 to-orange-200
    px-4 md:px-0
    text-gray-700
    subpixel-antialiased
    ">
    <div class="flex flex-col min-h-screen h-full xl:px-12">
        <x-layout.header />
        <main class="flex-grow ">
            {{ $slot }}
        </main>
        <x-layout.footer />
    </div>

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>