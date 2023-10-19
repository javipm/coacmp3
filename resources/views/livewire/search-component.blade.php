<div>
    <div class="hidden" wire:loading.class.remove="hidden">
        <x-layout.loader />
    </div>

    <section class="container w-full mx-auto h-full items-center">
        <h1 class="font-title text-2xl text-orange-600 mb-6">
            Búsqueda de agrupaciones
        </h1>

        <div class="mb-6 text-center">
            <div class="ad block w-[300px] h-[250px] md:w-[728px] md:h-[90px] lg:w-[970px] lg:h-[90px] mx-auto">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Arriba -->
                <ins class="adsbygoogle ad-top" style="display:block" data-ad-client="{{ env('APP_ADSENSE_CLIENT') }}"
                    data-ad-slot="{{ env('APP_ADSENSE_SLOT_ARRIBA') }}" data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    // (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>

        <input wire:model.live.debounce.300ms="query" placeholder="Introduce el nombre de una agrupación o autor..."
            type="search"
            class="block w-full bg-white focus:outline-none focus:bg-white focus:shadow text-gray-900 rounded-lg px-4 py-3 text-xs lg:text-md">

        @if(!empty($groups) && count($groups) > 0)
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" wire:loading.class="hidden">
            @foreach($groups as $i => $group)
            <a wire:key="{{ $group->id }}"
                href="{{ route('group', [ 'modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug ]) }}"
                class="bg-white block w-full p-3 border border-orange-50 shadow hover:shadow-lg text-sm rounded hover:bg-gray-75">

                <div class="w-full">
                    <span
                        class="inline-block px-2 py-1 mr-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">{{
                        $group->year }}</span>
                    <span
                        class="inline-block px-2 py-1 leading-none bg-blue-200 text-blue-800 rounded-full font-semibold  tracking-wide text-xs">{{
                        $group->modality->name }}</span>
                </div>

                <div class="w-full mt-3 text-orange-600">
                    <span>{{$group->name}}</span>
                </div>

                @if ($group->authorsLyrics)
                <div class="w-full mt-2">
                    <span class="text-xs text-gray-600">
                        <strong>Letra:</strong> {{$group->authorsLyrics->pluck('name')->join(', ', ' y ') }}
                    </span>
                </div>
                @endif

                @if ($group->authorsMusic)
                <div class="w-full mt-2">
                    <span class="text-xs text-gray-600">
                        <strong>Música:</strong> {{$group->authorsMusic->pluck('name')->join(', ', ' y ') }}
                    </span>
                </div>
                @endif
            </a>
            @endforeach
        </div>
        @else
        @if(!empty($query))
        <div
            class="p-4 bg-white rounded-lg absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2 transition-opacity duration-500">
            Lo siento, no hemos encontrado nada, prueba de nuevo
        </div>
        @endif
        @endif

    </section>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        (adsbygoogle = window.adsbygoogle || []).push({})

        Livewire.hook('morph.updating', ({ el, toEl, component }) => {
            (adsbygoogle = window.adsbygoogle || []).push({})
        })
    });
</script>