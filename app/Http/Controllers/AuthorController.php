<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Jaybizzle\LaravelCrawlerDetect\Facades\LaravelCrawlerDetect;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class AuthorController extends Controller
{
    public function view(string $author_slug = ''): \Illuminate\Contracts\View\View
    {
        $author = Author::where(['slug' => $author_slug])->firstOrFail();

        $SEOData = new SEOData(
            title: $author->name,
            description: 'Descarga los audios de las agrupaciones de '.$author->name.' del Carnaval de Cádiz en formato MP3 y de manera gratuita',
        );

        //Add pageviews
        if (! LaravelCrawlerDetect::isCrawler()) {
            $author->timestamps = false;
            $author->update([
                'pageviews' => $author->pageviews + 1,
            ]);
        }

        return view('author', compact('author', 'SEOData'));
    }
}
