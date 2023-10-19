<div>
    <div class="hidden" wire:loading.class.remove="hidden">
        <x-layout.loader />
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
    <div class="p-4 mt-4 bg-white rounded-lg grid grid-cols-1">
        Lo siento, no hemos encontrado nada, prueba de nuevo
    </div>
    @endif
    @endif

</div>