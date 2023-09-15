<x-layout :seoModel="$SEOData">

    @section('breadcrumbs-json-ld')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'home') }}
    @endsection

    <canvas id="confetti" class="overflow-hidden w-full h-screen m-0 absolute left-0 top-0 z-0"></canvas>

    <x-welcome.hero />

    <section class="container mt-20 mx-auto" id="ultimos-audios">
        <h2 class="text-3xl text-center font-semibold pb-5 text-orange-600 font-title">Últimos audios
            de actuaciones
        </h2>

        <div class="max-w-5xl mx-auto">
            @livewire('tables.last-actings-table')
        </div>
    </section>

    @if ($content)
    <article class="container mt-28 mx-auto text-xs text-gray-600 leading-7 [&>p]:pt-5 [&>p]:pb-2 [&>ul>li]:pl-5">
        {!! $content !!}
    </article>
    @endif

</x-layout>