@section('title')
Búsqueda de agrupaciones - {{ env('APP_NAME')}}
@endsection

@section('description')
Puedes buscar de manera cómoda y sencilla las agrupaciones que te interesen en la plataforma
@endsection

<x-layout>
    <section class="mt-2 mb-6">
        {{ Breadcrumbs::render('search') }}
    </section>

    @section('breadcrumbs-json-ld')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'search') }}
    @endsection

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-6">
            Búsqueda de agrupaciones
        </h1>

        <div class="mb-6 text-center">
            <div class="ad block w-full h-[250px] mx-auto">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Arriba -->
                <ins class="adsbygoogle ad-top" style="display:block" data-ad-client="{{ env('APP_ADSENSE_CLIENT') }}"
                    data-ad-slot="{{ env('APP_ADSENSE_SLOT_ARRIBA') }}" data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>

        <livewire:search-component />

    </section>

</x-layout>