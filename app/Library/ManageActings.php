<?php

namespace App\Library;

use App\Models\Author;
use App\Models\Group;
use App\Models\GroupActing;
use App\Models\Modality;

class ManageActings
{
    public static function insertActings(array $actings): bool|array
    {
        if (! $actings) {
            return false;
        }

        $actingsProcessed = [];
        $errors = [];

        foreach ($actings as $acting) {
            //Check if actings is yet inserted
            if (GroupActing::where('filename', $acting['filename'])->exists()) {
                continue;
            }

            //Search if group yet created
            if (! $group = Group::where('name', $acting['group'])->first()) {
                $group = new Group();
                $group->name = $acting['group'];
                $group->year = $acting['year'];
                $modality = Modality::where('name', $acting['modality'])->first();
                $group->modality_id = $modality->id;
                $group->save();

                //Scrapping group info
                $groupInfo = SearchGroupInfo::getGroupInfo($group->name);

                if ($groupInfo) {
                    $group->city = $groupInfo['city'];
                    $group->director = $groupInfo['director'];

                    foreach ($groupInfo['lyrics'] as $authorLyrics) {
                        $author = Author::where('name', $authorLyrics)->first();
                        if (! $author) {
                            $author = new Author();
                            $author->name = $authorLyrics;
                            $author->save();
                        }
                        $author->modalities()->syncWithoutDetaching($modality->id);
                        $group->authorsLyrics()->syncWithoutDetaching($author->id);
                    }

                    foreach ($groupInfo['music'] as $authorMusic) {
                        $author = Author::where('name', $authorMusic)->first();
                        if (! $author) {
                            $author = new Author();
                            $author->name = $authorMusic;
                            $author->save();
                        }
                        $author->modalities()->syncWithoutDetaching($modality->id);
                        $group->authorsMusic()->syncWithoutDetaching($author->id);
                    }

                    $group->save();

                } else {
                    $errors['NOT_INFO_FOUND'][] = $acting['filename'];
                }
            }

            $groupActing = new GroupActing();
            $groupActing->phase = $acting['phase'];
            $groupActing->filename = $acting['filename'];
            $groupActing->group_id = $group->id;
            $groupActing->save();

            $actingsProcessed[] = $acting['filename'];
        }

        return [
            'actings' => $actingsProcessed,
            'errors' => $errors,
        ];
    }
}
