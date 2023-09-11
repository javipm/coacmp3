<x-layout>
    <div class="flex items-center justify-center h-[calc(100vh-164px)]">
        <div class="p-4 space-y-4">
            <div class="flex flex-col items-start space-y-3 sm:flex-row sm:space-y-0 sm:items-center sm:space-x-3">
                <p class="font-semibold text-red-500 text-9xl ">@yield('code')</p>
                <div class="space-y-2">
                    <h1 id="pageTitle" class="flex items-center space-x-2">

                        <i class="bx bxs-error text-2xl text-red-500"></i>
                        <span class="text-xl font-medium text-gray-600 sm:text-2xl ">
                            @yield('title') :(
                        </span>
                    </h1>
                    <p class="text-base font-normal text-gray-600 ">
                        Puedes volver al
                        <a href="/" class="text-orange-600 hover:underline ">inicio</a> o probar a hacer una búsqueda.
                    </p>
                </div>
            </div>

            <form action="#" method="POST">
                <div class="flex items-center justify-center">
                    <input type="text" name="search" placeholder="¿Qué estás buscando?"
                        class="w-full px-4 py-2 rounded-l-md focus:outline-none focus:ring focus:ring-orange-400 " />
                    <button
                        class="p-2 text-white rounded-r-md bg-orange-600  hover:bg-orange-700  focus:outline-none focus:ring focus:ring-primary-light ">
                        <span class="sr-only">Buscar</span>
                        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>