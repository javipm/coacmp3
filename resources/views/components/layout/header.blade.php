<header class="relative container mx-auto flex items-center justify-between py-5 z-10">
    <div class="flex flex-grow basis-0 ">
        <a class="text-xl text-orange-700 font-bold uppercase tracking-wide font-title flex items-center justify-center transition hover:scale-110 hover:text-orange-900"
            href="/">
            <i class='bx bx-party bx-tada mr-2 text-3xl'></i>
            COAC Audios
        </a>
    </div>

    <nav class="hidden lg:block sm:hidden">
        <ul class="flex text-md mr-8
        [&>li>a]:transition-colors [&>li>a]:duration-300 [&>li>a]:text-orange-700  [&>li>a]:inline-block [&>li>a]:pl-8
        [&>li>a]:font-title
        [&>li>a:hover]:transition [&>li>a:hover]:text-orange-900
        [&>li>a:hover]:scale-110">
            <li><a href="/#last-actings">Últimos audios</a></li>
            <li><a href="{{ route('modality', 'comparsas') }}">Comparsas</a></li>
            <li><a href="{{ route('modality', 'chirigotas') }}">Chirigotas</a></li>
            <li><a href="{{ route('modality', 'coros') }}">Coros</a></li>
            <li><a href="{{ route('modality', 'cuartetos') }}">Cuartetos</a></li>
            <li><a class="px-0" href="#">Ediciones</a></li>
        </ul>
    </nav>

    <div class="flex basis-0 justify-end">
        <a href="{{ route('search') }}" title="Búsqueda" class=" h-6 w-6 text-orange-700 cursor-pointer transition
            hover:scale-125 hover:text-orange-900">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M11 6C13.7614 6 16 8.23858 16 11M16.6588 16.6549L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
        </a>
    </div>
</header>