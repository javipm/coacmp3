<header class="sticky top-0 z-10 backdrop-blur-sm">
    <div class="container mx-auto flex items-center justify-between py-5 ">
        <div class="pl-4 md:pl-0 flex flex-grow basis-0 ">
            <a class="text-xl text-orange-700 font-bold uppercase tracking-wide font-title flex items-center justify-center transition hover:scale-110 hover:text-orange-900"
                href="/">
                <i class='bx bx-party bx-tada mr-2 text-3xl'></i>
                COAC MP3
            </a>
        </div>

        <nav class="opacity-0  top-0 right-0
        h-screen w-full bg-white bg-opacity-95 text-center
        md:opacity-100 md:block md:text-left md:w-auto md:top-auto md:right-auto
        md:h-auto  md:bg-transparent " x-show="(mobileMenuOpen || !isMobile)"
            x-transition:enter="transform transition ease-out duration-500" x-transition:enter-start="translate-x-full"
            x-transition:enter-end="-translate-x-0" x-transition:leave="transform transition ease-in duration-500"
            x-transition:leave-start="-translate-x-0" x-transition:leave-end="translate-x-full"
            :class="{ 'absolute opacity-100': (mobileMenuOpen && isMobile), 'absolute opacity-0': (!mobileMenuOpen && isMobile)  }">
            <ul class="flex flex-col md:flex-row pt-20 md:pt-0 text-md mr-8
            [&>li>a]:mb-4
        [&>li>a]:md:mb-0 [&>li>a]:transition-colors [&>li>a]:duration-300 [&>li>a]:text-orange-700  [&>li>a]:inline-block [&>li>a]:pl-8
        [&>li>a]:font-title
        [&>li>a:hover]:transition [&>li>a:hover]:text-orange-900
        [&>li>a:hover]:scale-110">
                <li><a x-on:click="mobileMenuOpen = false" href="/#ultimos-audios">Últimos audios</a></li>
                <li><a x-on:click="mobileMenuOpen = false" href="{{ route('modality', 'comparsas') }}">Comparsas</a>
                </li>
                <li><a x-on:click="mobileMenuOpen = false" href="{{ route('modality', 'chirigotas') }}">Chirigotas</a>
                </li>
                <li><a x-on:click="mobileMenuOpen = false" href="{{ route('modality', 'coros') }}">Coros</a></li>
                <li><a x-on:click="mobileMenuOpen = false" href="{{ route('modality', 'cuartetos') }}">Cuartetos</a>
                </li>
            </ul>
        </nav>

        <div class="pr-4 md:pr-0 flex basis-0 justify-end">
            <a href="{{ route('search') }}" title="Búsqueda" class=" text-orange-700 cursor-pointer transition
            hover:scale-125 hover:text-orange-900">
                <i class='bx bx-search-alt  text-3xl'></i>
            </a>
            <div class="ml-2 md:hidden text-orange-700 cursor-pointer transition
        hover:scale-125 hover:text-orange-900 z-50">
                <i class='bx text-3xl' :class="{ 'bx-menu': !mobileMenuOpen, 'bx-x': mobileMenuOpen }"
                    x-on:click="mobileMenuOpen = !mobileMenuOpen"></i>
            </div>
        </div>
    </div>
</header>