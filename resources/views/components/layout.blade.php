<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" className="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <x-layout.seo :model="$seoModel ?? null" />
    @vite('resources/css/app.css')
    @livewireStyles

    @yield('breadcrumbs-json-ld')

    <x-layout.google-analytics />
</head>

<body x-data='{emojiRain: false, mobileMenuOpen: false, isMobile: !(window.innerWidth > 768)}'
    x-on:resize.window="isMobile = !(window.innerWidth > 768)" class="
    bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-orange-50 via-orange-100 to-orange-200
    text-gray-700
    subpixel-antialiased
    " :class="{'overflow-hidden': mobileMenuOpen, 'overflow-auto': !mobileMenuOpen}">
    <div class="flex flex-col min-h-screen h-full xl:px-12">
        <x-layout.header />
        <main class="flex-grow px-4 md:px-0">
            {{ $slot }}
        </main>
        <x-layout.footer />
    </div>

    <x-layout.emoji-rain />
    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>