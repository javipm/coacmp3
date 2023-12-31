<x-layout :seoModel="$SEOData">
    <section class="mt-2 mb-6">
        {{ Breadcrumbs::render('group', $group) }}
    </section>

    @section('breadcrumbs-json-ld')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'group', $group) }}
    @endsection

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-6">
            {{$group->modality->name}} {{ $group->name }}
        </h1>

        <div class="xl:grid grid-cols-3 gap-10">
            <article class="col-span-2">
                @if ($description)
                <p class="container  mb-6 mx-auto text-xs text-gray-600 leading-7">
                    {!! $description !!}
                </p>
                @endif
                <div class="mb-6 text-center">
                    <div class="ad block w-full h-[90px] mx-auto">
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
                <x-group.card :group="$group" />
                <x-group.audio-player :actings="$actings" :initialSong="$initialSong"
                    :actingSelected="$actingSelected" />

                <div class="mt-6 text-center">
                    <div class="ad block w-full h-[90px] mx-auto">
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
            </article>

            <aside class="flex flex-col">
                <div class="ad block w-full h-[600px] mx-auto">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

                    <!-- Lateral -->
                    <ins class="adsbygoogle ad-lateral mx-auto" style="display:block"
                        data-ad-client="{{ env('APP_ADSENSE_CLIENT') }}"
                        data-ad-slot="{{ env('APP_ADSENSE_SLOT_LATERAL') }}" data-ad-format="auto"
                        data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>

                <livewire:aside-related-component />
            </aside>
        </div>


    </section>
</x-layout>