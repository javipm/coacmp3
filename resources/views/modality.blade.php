<x-layout :seoModel="$modality">
    <section class="mt-2 mb-6">
        {{ Breadcrumbs::render('modality', $modality) }}
    </section>

    @section('breadcrumbs-json-ld')
    {{ Breadcrumbs::view('breadcrumbs::json-ld', 'modality', $modality) }}
    @endsection

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-6">
            {{ Str::plural($modality->name) }}
        </h1>

        @if($modality->description)
        <div class="mb-6 text-center">
            <div class="ad block w-full h-[250px]  mx-auto">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Arriba -->
                <ins class="adsbygoogle ad-top mx-auto" style="display:block"
                    data-ad-client="{{ env('APP_ADSENSE_CLIENT') }}" data-ad-slot="{{ env('APP_ADSENSE_SLOT_ARRIBA') }}"
                    data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <article class="mb-10 md:mb-0
            [&>h3]:text-md [&>h3]:font-title [&>h3]:text-orange-800 [&>h3]:pb-4
            [&>p]:text-xs [&>p]:pb-4 [&>p]:text-gray-600">
            {!! $modality->description !!}
        </article>
        <div class="mt-6 mb-6 text-center">
            <div class="ad block w-full h-[250px] mx-auto">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Abajo -->
                <ins class="adsbygoogle ad-bottom mx-auto" style="display:block"
                    data-ad-client="{{ env('APP_ADSENSE_CLIENT') }}" data-ad-slot="{{ env('APP_ADSENSE_SLOT_ABAJO') }}"
                    data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>

        <article>
            <h2 class="font-title text-md text-orange-800 pb-4">{{ Str::plural($modality->name) }}
                @if ($modality->name == 'Cuarteto'||$modality->name == 'Coro')
                destacados
                @else
                destacadas
                @endif
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 ">
                @foreach($groups as $group)
                <a class="shadow hover:shadow-lg
                @if (count($groups) == 1)
                col-span-2
                @else
                col-span-1
                @endif
                " href="{{ route('group', ['modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug]) }}"
                    title="{{$group->name}}">
                    <x-group.card :group="$group" :outside="true" />
                </a>
                @endforeach
            </div>
        </article>
        @endif

    </section>

</x-layout>