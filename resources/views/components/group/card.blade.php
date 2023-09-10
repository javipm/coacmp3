<div class="c-card block bg-white">
    <div class="relative h-14 p-4  bg-orange-600 text-white rounded-t">
        <div class="font-bold">
            <span
                class="inline-block px-2 py-1 mr-2 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-md">{{
                $group->year }}</span>
            <span class="text-md">{{ $group->name }}</span>
        </div>
        {{-- <p class="text-sm">{{ $acting->created_at->format('d/m/Y') }}</p> --}}
    </div>

    @if ($group->director)
    <div class="px-4 py-3 border-b text-xs text-gray-700">
        <span class="grid grid-cols-2 items-center h-full">
            <div>
                <i class="bx bxs-user text-gray-900 mr-2"></i> <span class="font-bold mr-1">Director
                </span>
            </div>
            <div>{{$group->director}}</div>
        </span>
        @endif
    </div>

    @if ($group->authorsLyrics)
    <div class="px-4 py-3 border-b text-xs text-gray-700">
        <span class="grid grid-cols-2 items-center h-full">
            <div>
                <i class="bx bxs-pencil text-gray-900 mr-2"></i> <span class="font-bold mr-1">Letra
                </span>
            </div>
            <div>
                {{$group->authorsLyrics->pluck('name')->join(', ', ' y ') }}
            </div>
        </span>
    </div>
    @endif

    @if ($group->authorsMusic)
    <div class="px-4 py-3 border-b text-xs text-gray-700">
        <span class="grid grid-cols-2 items-center h-full">
            <div>
                <i class="bx bxs-music text-gray-900 mr-2"></i> <span class="font-bold mr-1">Música
                </span>
            </div>
            <div>
                {{$group->authorsMusic->pluck('name')->join(', ', ' y ') }}
            </div>
        </span>
    </div>
    @endif
</div>