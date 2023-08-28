<?php

namespace App\Library;

class SearchGroupInfo
{
    public static function getGroupInfo(string $group): bool|array
    {
        if (! $group) {
            return false;
        }

        $info = [];

        return $info;
    }
}
