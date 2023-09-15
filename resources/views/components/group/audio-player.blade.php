<div x-data='{ play: false, track: {{ $initialSong }} }' x-init="player()" class=" bg-white">
    <div class="bg-gray-50 flex flex-col items-center justify-center border-t-2 border-b-2 border-orange-600">
        <div class="relative w-full flex flex-col ">
            <x-layout.loader />
            <div id="audio-player" class="opacity-0 transition-opacity duration-500 md:grid md:grid-cols-2">
                <div class="">
                    <div class="px-10 pt-5 pb-4 flex items-center z-40">
                        <div class="flex flex-col">
                            <h2 data-amplitude-song-info="name" class="text-xl  leading-7 text-slate-900 ">{{
                                $actingSelected->phase }} - {{ $actingSelected->created_at->format('d/m/Y') }}</h2>
                            <span data-amplitude-song-info="artist" class="text-xs  leading-6 text-gray-500">{{
                                $actingSelected->group->name }}</span>
                        </div>
                    </div>
                    <div class="w-full flex flex-col px-10 pb-6 z-40">
                        <input type="range" id="song-percentage-played"
                            class="amplitude-song-slider mb-3 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-orange-600"
                            step=".1" />
                        <div class="flex w-full justify-between">
                            <span class="amplitude-current-time text-xs tracking-wide  text-gray-500">-</span>
                            <span class="amplitude-duration-time text-xs tracking-wide  text-gray-500">-</span>
                        </div>
                    </div>
                </div>
                <div
                    class="h-control-panel px-10 py-6 bg-control-panel-light-background flex items-center justify-between z-40 ">

                    <div class="cursor-pointer amplitude-prev">
                        <i class=' bx bx-skip-previous text-5xl m-0 text-gray-400'></i>
                    </div>
                    <div x-on:click="play = !play"
                        class="cursor-pointer amplitude-play-pause w-20 h-20 rounded-full bg-white border border-play-pause-light-border shadow-xl flex items-center justify-center text-center transition duration-500">
                        <i class=' bx bx-play text-5xl pl-2 m-0 text-orange-600' x-show="!play"></i>
                        <i class='bx bx-pause text-5xl text-orange-600' x-show="play"></i>
                    </div>
                    <div class="cursor-pointer amplitude-next text-right">
                        <i class='bx bx-skip-next text-5xl m-0 text-gray-400'></i>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="pt-4 pb-4 bg-white border-b border-gray-200 w-full align-center text-center">
        <span class="font-title text-2xl text-orange-600">
            Audios disponibles</span>
    </div>

    <ul id="song-list" class="text-xs sm:text-base divide-y" data-start={{$initialSong }}>
        @foreach ($actings as $acting)
        <li class="flex items-center space-x-3 hover:bg-gray-100"
            :class="track == {{ $loop->index }} ? 'bg-gray-50 font-bold' : ''" data-artist=" {{ $acting->group->name
            }}" data-title="{{ $acting->phase }} - {{ $acting->created_at->format('d/m/Y') }}"
            data-url="{{ $acting->url }}">
            <div class="px-4 py-2 flex-1 text-xs">
                <span>{{ $acting->phase }}</span>
                <br />
                <span class="text-xs text-gray-400">{{ $acting->created_at->format('d/m/Y') }}</span>
            </div>
            <button data-amplitude-song-index="{{ $loop->index }}" x-on:click="play = true; track={{ $loop->index }}"
                class="amplitude-play-pause px-4 py-2 text-orange-600 hover:bg-orange-500 hover:text-white group focus:outline-none">
                <i x-transition x-cloak class='bx text-xl'
                    :class="track != {{ $loop->index }} ? 'bx-play-circle' : 'bxl-deezer bx-flashing'"></i>
            </button>
            <a download href="{{ $acting->url }}"
                class="px-4 py-2 text-orange-600 hover:bg-orange-500 hover:text-white group focus:outline-none">
                <i class='bx bx-download text-xl'></i>
            </a>
        </li>
        @endforeach

    </ul>
</div>