<footer
    class="relative container mx-auto flex flex-col md:flex-row items-center justify-between py-5 z-10 mt-5 md:mt-0 border-t border-orange-200 md:border-t-0">
    <div class="flex flex-grow basis-0 mb-5 md:mb-0">
        <span class="font-light text-xs text-gray-900 tracking-wide flex">{{ date('Y') }} - Desarrollado
            por</span>
        <a class="text-xs ml-1 text-orange-600 font-bold  tracking-wide flex" href="https://amarillolimon.net">
            Amarillo Limón
        </a>
        <span class="text-xs ml-1 text-orange-600 font-bold  tracking-wide flex cursor-pointer"
            x-on:click="emojiRain = !emojiRain">🍋</span>
    </div>

    <nav class="">
        <ul class="flex
        [&>li>a]:text-xs [&>li>a]:transition-colors [&>li>a]:duration-300 [&>li>a]:text-orange-600  [&>li>a]:inline-block [&>li>a]:px-2
        [&>li>a]:font-light
        [&>li>a:hover]:transition [&>li>a:hover]:text-orange-800">
            <li><a href="/aviso-legal">Aviso legal</a></li>
            <li>
                <a href="https://www.twitter.com/amlimon/" target="_blank">
                    <i class='bx bxl-twitter'></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/amarillolimonm/" target="_blank">
                    <i class='bx bxl-instagram'></i>
                </a>
            </li>
            <li>
                <a href="https://github.com/javipm/coacmp3" target="_blank">
                    <i class='bx bxl-github'></i>
                </a>
            </li>
        </ul>
    </nav>
</footer>