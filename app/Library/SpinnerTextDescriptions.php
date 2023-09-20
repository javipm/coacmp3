<?php

namespace App\Library;

use App\Models\Group;
use App\Models\GroupActing;

class SpinnerTextDescriptions
{
    const TEXT_TEMPLATES = [
        0 => 'Disfruta de la actuación de la >modality <strong>>name</strong> en la >phase del COAC >year. Este grupo, originario de >city, ha sido creado por >authors_lyrics, con la música compuesta por >authors_music. Desde este sitio web, tienes la opción de escuchar su actuación de manera gratuita a través de nuestro reproductor o descargarla en formato MP3 para disfrutarla cómodamente desde cualquier dispositivo.',

        1 => 'Escucha la actuación de la >modality <strong>>name</strong> en la fase >phase del COAC >year. Esta agrupación, que proviene de >city, ha sido escrita por >authors_lyrics, y cuenta con la música de >authors_music. Desde esta página, puedes disfrutar de su actuación de forma gratuita a través de nuestro reproductor o descargarla en formato MP3 para escucharlo en cualquier dispositivo.',

        2 => 'Goza de la actuación ofrecida por la >modality <strong>>name</strong> en la fase >phase del COAC >year. Esta destacada agrupación, oriunda de >city, ha sido creada por >authors_lyrics, y su música es obra de >authors_music. En esta plataforma, tienes la opción de disfrutar de su actuación de manera gratuita mediante nuestro reproductor o descargarla en formato MP3 para su comodidad en cualquier dispositivo.',

        3 => 'Deléitate con la actuación de la >modality <strong>>name</strong> en la fase >phase del COAC >year. Este grupo, con origen en >city, ha sido concebido por >authors_lyrics, y la música ha sido compuesta por >authors_music. Desde este sitio web, tienes la posibilidad de escuchar su actuación de forma gratuita utilizando nuestro reproductor o descargarla en formato MP3 para tu comodidad en cualquier dispositivo.',

        4 => 'Disfruta de la actuación brindada por la >modality <strong>>name</strong> en la fase >phase del COAC >year. Esta agrupación, que tiene su origen en >city, ha sido creada por >authors_lyrics, con la música a cargo de >authors_music. Desde esta página, tienes la opción de escuchar su actuación de manera gratuita utilizando nuestro reproductor o descargarla en formato MP3 para su conveniencia en cualquier dispositivo.',
    ];

    public static function getForActing(GroupActing $acting): string
    {
        $description = '';

        $random = rand(0, count(self::TEXT_TEMPLATES) - 1);
        $template = self::TEXT_TEMPLATES[$random];

        if (! $template) {
            return $description;
        }

        $vars = [
            '>modality' => $acting->group->modality->name,
            '>name' => $acting->group->name,
            '>year' => $acting->group->year,
            '>phase' => strtolower($acting->phase),
            '>authors_lyrics' => $acting->group->authorsLyrics->pluck('name')->join(', ', ' y '),
            '>authors_music' => $acting->group->authorsMusic->pluck('name')->join(', ', ' y '),
            '>city' => $acting->group->city,
        ];

        $description = strtr($template, $vars);

        return $description;
    }

    public static function getForGroup(Group $group): string
    {
        $description = '';

        $random = rand(0, count(self::TEXT_TEMPLATES) - 1);
        $template = self::TEXT_TEMPLATES[$random];

        if (! $template) {
            return $description;
        }

        $vars = [
            '>modality' => $group->modality->name,
            '>name' => $group->name,
            '>year' => $group->year,
            'en la >phase ' => '',
            'en la fase >phase' => '',
            '>authors_lyrics' => $group->authorsLyrics->pluck('name')->join(', ', ' y '),
            '>authors_music' => $group->authorsMusic->pluck('name')->join(', ', ' y '),
            '>city' => $group->city,
        ];

        $description = strtr($template, $vars);

        return $description;
    }
}
