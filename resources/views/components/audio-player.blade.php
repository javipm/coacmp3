<div x-data='{ play: false }' x-init="player()" class=" bg-white shadow-lg overflow-hidden">
    <div class="bg-gray-50 flex flex-col items-center justify-center">
        <div class="relative w-full flex flex-col shadow-player-light bg-player-light-background ">
            <div id="audio-player-loader" role="status"
                class="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2 transition-opacity duration-500">
                <svg aria-hidden="true"
                    class="w-24 h-24 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-orange-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Cargando...</span>
            </div>
            <div id="audio-player" class="opacity-0 transition-opacity duration-500">
                <div class="px-10 pt-5 pb-4 flex items-center z-50">
                    <div class="flex flex-col">
                        <h2 data-amplitude-song-info="name" class="text-xl  leading-7 text-slate-900 ">{{
                            $actingSelected->phase }} - {{ $actingSelected->created_at->format('d/m/Y') }}</h2>
                        <span data-amplitude-song-info="artist" class="text-xs  leading-6 text-gray-500">{{
                            $actingSelected->group->name }}</span>
                    </div>
                </div>
                <div class="w-full flex flex-col px-10 pb-6 z-50">
                    <input type="range" id="song-percentage-played"
                        class="z-10 amplitude-song-slider mb-3 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-orange-600"
                        step=".1" />
                    <div class="flex w-full justify-between">
                        <span class="amplitude-current-time text-xs tracking-wide  text-gray-500">-</span>
                        <span class="amplitude-duration-time text-xs tracking-wide  text-gray-500">-</span>
                    </div>
                </div>
                <div
                    class="h-control-panel px-10 py-6 bg-control-panel-light-background border-t border-orange-200 flex items-center justify-between z-50 ">

                    <div class="cursor-pointer amplitude-prev">
                        <i class=' bx bx-skip-previous text-5xl m-0 text-gray-400'></i>
                    </div>
                    <div ' x-on:click="play = !play"
                    class="cursor-pointer amplitude-play-pause w-20 h-20 rounded-full bg-white border border-play-pause-light-border shadow-xl flex items-center justify-center text-center ">
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

    <ul id="song-list" class="text-xs sm:text-base divide-y border-t cursor-default" data-start={{ $initialSong }}>
        @foreach ($actings as $acting)
        <li class="flex items-center space-x-3 hover:bg-gray-100" data-artist="{{ $acting->group->name }}"
            data-title="{{ $acting->phase }} - {{ $acting->created_at->format('d/m/Y') }}"
            data-url="{{ $acting->url }}">
            <div class="p-3 flex-1 text-xs">
                <span>{{ $acting->phase }}</span>
                <br />
                <span class="text-xs text-gray-400">{{ $acting->created_at->format('d/m/Y') }}</span>
            </div>
            <button data-amplitude-song-index="{{ $loop->index }}" x-on:click="play = true"
                class="amplitude-play-pause p-3 text-orange-600 hover:bg-orange-500 hover:text-white group focus:outline-none">
                <i class='bx bx-play-circle text-xl'></i>
            </button>
            <a target="_blank" href="{{ $acting->url }}"
                class="p-3 text-orange-600 hover:bg-orange-500 hover:text-white group focus:outline-none">
                <i class='bx bx-download text-xl'></i>
            </a>
        </li>
        @endforeach

    </ul>
</div>