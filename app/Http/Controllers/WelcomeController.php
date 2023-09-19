<?php

namespace App\Http\Controllers;

use App\Models\Page;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class WelcomeController extends Controller
{
    public function home(): \Illuminate\Contracts\View\View
    {
        $SEOData = new SEOData(
            title: 'Audios de Carnaval de Cádiz COAC '.env('APP_AUDIO_YEAR').' en MP3 - Comparsas - Chirigotas - Cuartetos - Coros',
            enableTitleSuffix: false,
            description: 'Descarga las actuaciones de las agrupaciones del COAC en el Falla en formato MP3. Todos los audios de las comparsas, chirigotas, cuartetos y coros del COAC 2023.',
        );

        $content = Page::where('slug', 'home')->first()->content;

        return view('welcome', compact('SEOData', 'content'));
    }

    public function legal(): \Illuminate\Contracts\View\View
    {
        $SEOData = new SEOData(
            title: 'Aviso legal',
            description: 'Aviso legal COAC MP3.',
        );

        $content = Page::where('slug', 'aviso-legal')->first()->content;

        return view('legal', compact('SEOData', 'content'));
    }
}
