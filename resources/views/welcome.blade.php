<x-layout>
    <canvas id="confetti" class="overflow-hidden w-full h-full m-0 absolute top-0 z-0"></canvas>

    <x-welcome.hero />

    <section class="container pt-20 mx-auto">
        <h2 class="text-3xl text-center font-semibold pb-5 text-orange-600 font-title">Últimos audios de actuaciones
        </h2>

        @livewire('tables.last-actings-table')
    </section>

    <x-welcome.seo-text />

</x-layout>