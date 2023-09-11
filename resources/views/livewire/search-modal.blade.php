<section>
    <!-- Main modal -->
    <div x-show="isSearchModalOpen" x-cloak x-transition id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen backdrop-blur">
        <div x-on:click.away="isSearchModalOpen = false"
            class="relative left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between px-4 pt-4 rounded-t dark:border-gray-600  text-center">
                    <span class="text-lg font-title font-bold text-orange-600 dark:text-white">
                        Búsqueda de agrupaciones
                    </span>
                    <button x-on:click="isSearchModalOpen = false" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4">
                    <input type="text" class="w-full px-4 py-2 border rounded bg-gray-100 text-gray-900 text-sm "
                        placeholder="Introduce el nombre de la agrupación o autor..."
                        wire:model.live.debounce.500ms="query" />

                    <!-- Results -->
                    @if(!empty($query))
                    <section class="bg-white mt-4 overflow-auto max-h-64">
                        @if(!empty($groups) && count($groups) > 0)
                        @foreach($groups as $i => $group)
                        <a href="{{ route('group', [ 'modality' => $group->modality->slug, 'year' => $group->year, 'group' => $group->slug ]) }}"
                            class="block w-full px-4 py-2 border text-sm hover:bg-gray-100 hover:text-orange-600">
                            <span
                                class="inline-block px-2 py-1 mr-2 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-sm">{{
                                $group->year }}</span>
                            <span
                                class="inline-block px-2 py-1 mr-2 leading-none bg-blue-200 text-blue-800 rounded-full font-semibold  tracking-wide text-sm">{{
                                $group->modality->name }}</span>

                            <span>{{
                                $group->name
                                }}</span>
                        </a>
                        @endforeach
                        @else
                        <div class="block w-full px-4 py-2 border text-sm">
                            Lo siento, no hemos encontrado nada, prueba de nuevo <i
                                class='bx bx-upside-down text-orange-600 font-bold'></i>
                        </div>
                        @endif
                    </section>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>