<section class="container relative mx-auto md:grid md:grid-cols-3 auto-rows-fr items-center h-[calc(100vh-68px)]">
    <div class="text-center mr-auto place-self-center md:text-left md:col-span-2">
        <h1 class="mt-10 text-5xl md:mt-0 md:text-6xl text-gray-700 uppercase font-title font-extrabold">Carnaval de
            Cádiz <span class="text-orange-600 font-light">audios</span>
        </h1>

        <div class="mt-12 md:mt-8 text-sm md:text-md font-light">
            Desde aquí podrás descargar las actuaciones de las agrupaciones del Concurso Oficial de Agrupaciones del
            Carnaval de Cádiz en formato MP3. Podrás encontrar las <h2 class="inline">actuaciones del COAC del año 2022,
                2023 y 2024.</h2>
            <br /><br />
            Todos los audios son extraidos cada madrugada de los vídeos que sube <a class="text-orange-700"
                rel="nofollow" href="https://www.youtube.com/channel/UCpOz3CN6mDlxkE7-m5AS1aQ"
                target="_blank">@ONDACADIZCARNAVAL</a>, mil gracias a ellos.
        </div>
    </div>
    <img x-data @click="window.launchConfetti()" id="imagen-falla"
        class="mt-10 w-80 md:mt-0 md:w-full mx-auto cursor-pointer" src="assets/falla.png"
        alt="Teatro Falla de Cádiz" />

</section>

<x-welcome.scroll-icon />