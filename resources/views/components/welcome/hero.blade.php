<section class="container relative mx-auto grid md:grid-cols-3 auto-rows-fr items-center h-[calc(100vh-68px)]">
    <div class="text-center mr-auto place-self-center md:text-left md:col-span-2">
        <h1 class="text-6xl text-gray-700 uppercase font-title font-extrabold">Carnaval de Cádiz <span
                class="text-orange-600 font-light">audios</span>
        </h1>

        <p class="mt-8 text-md font-light">Desde aquí podrás descargar las actuaciones de las agrupaciones del COAC {{
            date('Y') }}
            en
            formato MP3. <br /> Todos los audios son extraidos cada madrugada de los vídeos que sube <a
                class="text-orange-700" rel="nofollow" href="https://www.youtube.com/channel/UCpOz3CN6mDlxkE7-m5AS1aQ"
                target="_blank">@ONDACADIZCARNAVAL</a>, mil gracias a ellos.</p>
    </div>
    <img x-data @click="window.launchConfetti()" id="imagen-falla" class="mx-auto cursor-pointer" src="assets/falla.png"
        alt="Teatro Falla de Cádiz" />

</section>

<x-welcome.scroll-icon />