<div class="c-card block bg-white">
    <div class="relative h-20 2xl:h-16 p-4  bg-orange-600 text-white rounded-t">
        <div class="font-bold flex h-full">
            <span
                class="m-auto ml-0 mr-4 px-2 py-1 [text-wrap:balance] leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-md">{{
                $group->year }}</span>
            <span class="text-md my-auto">{{ $group->name }}</span>
        </div>
        {{-- <p class="text-sm">{{ $acting->created_at->format('d/m/Y') }}</p> --}}
    </div>

    @if ($group->director)
    <div class="@if (isset($outside)) lg:h-20 @endif px-4 py-3 border-b text-xs text-gray-700">
        <span class="grid grid-cols-3 items-center h-full">
            <div>
                <i class="bx bxs-user text-gray-900 mr-2"></i> <span class="font-bold mr-1">Director
                </span>
            </div>
            <span class="col-span-2">{{$group->director}}</span>
        </span>
        @endif
    </div>

    @if ($group->authorsLyrics)
    <div class="@if (isset($outside)) lg:h-20 @endif px-4 py-3 border-b text-xs text-gray-700">
        <span class="grid grid-cols-3 items-center h-full">
            <div>
                <i class="bx bxs-pencil text-gray-900 mr-2"></i> <span class="font-bold mr-1">Letra
                </span>
            </div>
            <span class="col-span-2">
                @foreach ($group->authorsLyrics as $author)
                @if (isset($outside))
                <span>{{ $author->name }}</span>
                @else
                <a wire:navigate href="{{ route('author', ['author' => $author->slug]) }}"
                    class="cursor-pointer hover:text-orange-800 hover:underline">{{ $author->name }}</a>
                @endif
                @if (!$loop->last && $loop->remaining > 1), @endif
                @if ($loop->remaining == 1) y @endif
                @endforeach
            </span>

        </span>
    </div>
    @endif

    @if ($group->authorsMusic)
    <div class="@if (isset($outside)) lg:h-20 @endif px-4 py-3 border-b text-xs text-gray-700">
        <span class="grid grid-cols-3 items-center h-full">
            <div>
                <i class="bx bxs-music text-gray-900 mr-2"></i> <span class="font-bold mr-1">Música
                </span>
            </div>
            <span class="col-span-2">
                @foreach ($group->authorsMusic as $author)
                @if (isset($outside))
                <span>{{ $author->name }}</span>
                @else
                <a wire:navigate href="{{ route('author', ['author' => $author->slug]) }}"
                    class="cursor-pointer hover:text-orange-800 hover:underline">{{ $author->name }}</a>
                @endif
                @if (!$loop->last && $loop->remaining > 1), @endif
                @if ($loop->remaining == 1) y @endif
                @endforeach
            </span>
        </span>
    </div>
    @endif
</div>