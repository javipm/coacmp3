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

        $info = [];

        // NOT UPLOADED TO GITHUB: Scrapper group information :)
        // For obvious reasons, this part of the code is not published in the repository

        // EXAMPLE:
        // $browser = new HttpBrowser(HttpClient::create());
        // $crawler = $browser->request('GET', 'https://www.symfony.com/blog/');
        // $crawler->filter('h2 > a')->each(function ($node) {
        //     echo $node->text()."\n";
        // });

        return $info;
    }
}
