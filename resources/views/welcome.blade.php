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
            <div class="mb-2 text-center">
                <div class="ad block w-[300px] h-[250px] md:w-[728px] md:h-[90px] lg:w-full lg:h-auto mx-auto">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Arriba -->
                    <ins class="adsbygoogle ad-top mx-auto" style="display:block"
                        data-ad-client="{{ env('APP_ADSENSE_CLIENT') }}"
                        data-ad-slot="{{ env('APP_ADSENSE_SLOT_ARRIBA') }}" data-ad-format="auto"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
            @livewire('tables.last-actings-table')
            <div class="mt-12 text-center">
                <div class="ad block w-[300px] h-[250px] md:w-[970px] md:h-[250px] mx-auto">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- Abajo -->
                    <ins class="adsbygoogle ad-bottom mx-auto" style="display:block"
                        data-ad-client="{{ env('APP_ADSENSE_CLIENT') }}"
                        data-ad-slot="{{ env('APP_ADSENSE_SLOT_ABAJO') }}" data-ad-format="auto"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
        </div>
    </section>

    @if ($content)
    <article class="container mt-6 mx-auto text-xs text-gray-600 leading-7 [&>p]:pt-5 [&>p]:pb-2 [&>ul>li]:pl-5">
        {!! $content !!}
    </article>
    @endif

</x-layout>