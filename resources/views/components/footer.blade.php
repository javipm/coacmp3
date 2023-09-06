<footer class="relative container mx-auto flex items-center justify-between py-5 z-10">
    <div class="flex flex-grow basis-0 ">
        <span class="font-light text-xs text-gray-900 tracking-wide flex">{{ date('Y') }} - Desarrollado
            por</span>
        <a class="text-xs ml-1 text-orange-600 font-bold  tracking-wide flex" href="https://amarillolimon.net">
            Amarillo Limón 🍋
        </a>
    </div>

    <nav class="">
        <ul class="flex text-sm
        [&>li>a]:transition-colors [&>li>a]:duration-300 [&>li>a]:text-orange-600  [&>li>a]:inline-block [&>li>a]:px-2
        [&>li>a]:font-light
        [&>li>a:hover]:transition [&>li>a:hover]:text-orange-800">
            <li><a href="#">Aviso legal</a></li>
            <li><a href="#">Contacto</a></li>
            <li>
                <a href="#">
                    <svg width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path
                            d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497 -3.753C20.18 7.773 21.692 5.25 22 4.009z" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#">
                    <svg width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="4" width="16" height="16" rx="4" />
                        <circle cx="12" cy="12" r="3" />
                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</footer>