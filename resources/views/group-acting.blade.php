<x-layout>
    <section class="container w-full mx-auto">
        <div class="md:grid grid-cols-4 gap-10">
            <div class="col-span-1 mb-10 md:mb-0">
                <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <div class="relative pb-36 overflow-hidden">
                        <img class="absolute inset-0 h-full w-full object-cover opacity-20"
                            src="/assets/modalities/coro.jpg" alt="">
                        <h3
                            class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 font-title text-4xl d text-orange-600">
                            {{
                            $group->modality->name }}</h3>
                    </div>
                    <div class="p-4 border-b">
                        <span
                            class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">{{
                            $group->year }}</span>
                        <h1 class="mt-2 mb-2  font-bold">{{ $group->name }} </h1>
                        {{-- <p class="text-sm">{{ $acting->created_at->format('d/m/Y') }}</p> --}}
                    </div>

                    @if ($group->director)
                    <div class="p-4 border-b text-xs text-gray-700 flex flex-col">
                        <span class="grid grid-cols-2">
                            <div>
                                <i class="bx bxs-user text-gray-900 mr-2"></i> <span class="font-bold mr-1">Director
                                </span>
                            </div>
                            <div>{{$group->director}}</div>
                        </span>
                        @endif
                    </div>

                    @if ($group->authorsLyrics)
                    <div class="p-4 border-b text-xs text-gray-700 flex flex-col">
                        <span class="grid grid-cols-2">
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
                    <div class="p-4 border-b text-xs text-gray-700 flex flex-col">
                        <span class="grid grid-cols-2">
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
            </div>
            <div class="col-span-1 mb-10 md:mb-0">
                <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <x-audio-player :actings="$actings" :initialSong="$initialSong" :actingSelected="$actingSelected" />
                </div>
            </div>

            <article class="col-span-2 mb-10 md:mb-0 [&>p]:text-sm [&>p]:pb-4 [&>p]:text-gray-700">
                {!! $group->description !!}
            </article>
        </div>
    </section>
</x-layout>