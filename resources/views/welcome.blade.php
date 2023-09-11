<x-layout :seoModel="$SEOData">
    <canvas id="confetti" class="overflow-hidden w-full h-full m-0 absolute left-0 top-0 z-0"></canvas>

    <x-welcome.hero />

    <section class="container mt-20 mx-auto" id="last-actings">
        <h2 class="text-3xl text-center font-semibold pb-5 text-orange-600 font-title">Últimos audios
            de actuaciones
        </h2>

        <div class="max-w-5xl mx-auto">
            @livewire('tables.last-actings-table')
        </div>
    </section>

    <x-welcome.seo-text />

</x-layout>