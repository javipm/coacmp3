<p  align="center"><a  href="https://coacmp3.com"  target="_blank"><img  src="https://coacmp3.com/assets/falla.png"  width="400"  alt="Laravel Logo"></a></p>

## COACMP3 - Descarga de audios del Carnaval de Cádiz

[COACMP3](https://coacmp3.com) es una web para escuchar o descargar cómodamente las actuaciones del Carnaval de Cádiz (COAC) en formato MP3.

Desde el 2016 lleva funcionando con un simple script en PHP para mostrar los ficheros MP3, siendo desde entonces la web más visitada de descarga de los audios de actuaciones del COAC. En 2023 se actualiza completamente la plataforma, con el objetivo de mejorar el uso, rendimiento y posicionamiento SEO.

<img  src="https://coacmp3.com/assets/screenshoot.jpg"  alt="Captura COACMP3"  width="100%">

Los audios son extraidos cada madrugada de los vídeos que sube [@ONDACADIZCARNAVAL](https://www.youtube.com/channel/UCpOz3CN6mDlxkE7-m5AS1aQ) a Youtube, usando un script bash con [yt-dlp](https://github.com/yt-dlp/yt-dlp) y una tarea cron que rellena la información del grupo a través de un scrapper.

### Tecnologías usadas

La aplicación está desarrollada principalmente con [Laravel](https://github.com/laravel/laravel), [Filament](https://filamentphp.com/) y [Livewire](https://laravel-livewire.com/). Para el front se ha usado [TailwindCSS](https://tailwindcss.com/), [AlpineJS](https://alpinejs.dev/) y [AmplitudeJS](https://github.com/serversideup/amplitudejs) para el reproductor de audio.

### Despliegue

Para lanzar la aplicación en local se debe:

-   Clonar el repositorio

-   Copiar el fichero `.env.example` a `.env` y configurar

-   Ejecutar `composer install`

-   Ejecutar `php artisan migrate` para crear la estructura de la BD

-   Ejecutar `npm install`

-   Ejecutar `npm run dev` y en paralelo `php artisan serve`

-   Se deberá poder acceder a la aplicación en http://localhost:8000

### Uso

El panel de Filament está desplegado en la ruta `/backamarillo`

La aplicación tiene varios comandos que se deben usar para ir añadiendo los audios a la BD:

-   `php artisan app:refresh-actings` que consiste en 3 cosas:

    -   Busca los ficheros MP3 disponibles en la carpeta `APP_AUDIO_FILES`. Los ficheros deben seguir la estructura _MODALIDAD, GRUPO - FASE.mp3_
    -   Busca las actuaciones que no están añadidas en la BD
    -   Rastrea la información del grupo y la rellena si es posible
    -   Envía un email resumen de las actuaciones importadas y posibles errores

-   `php artisan app:sitemap-generator` que genera el sitemap.xml de la aplicación
-   `php artisan app:fill-groups-description` mediante un spinner rellena automáticamente las descripciones de los grupos y actuaciones, para que en la web haya texto de algún tipo
