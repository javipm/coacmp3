<?php

namespace App\Library;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class SearchGroupInfo
{
    public static function getGroupInfo(string $group): bool|array
    {
        if (! $group) {
            return false;
        }

        $result = [];

        $groupSearchString = $group;
        $url = env('APP_AUDIO_SCRAPPER_BASE_URL', '').$groupSearchString;

        $lyrics = [];
        $music = [];
        $director = '';
        $city = '';

        if (! $lyrics || ! $music || ! $director || ! $city) {
            return false;
        }

        // NOT UPLOADED TO GITHUB: Scrapper group information :)
        // For obvious reasons, this part of the code is not published in the repository

        // EXAMPLE:
        // $browser = new HttpBrowser(HttpClient::create());
        // $crawler = $browser->request('GET', $url);
        // $crawler->filter('h2')->first()->each(function ($node) {
        //     $lyrics = $node->text();
        // });

        $result = [
            'lyrics' => $lyrics,
            'music' => $music,
            'director' => $director,
            'city' => $city,
        ];

        return $result;
    }
}
