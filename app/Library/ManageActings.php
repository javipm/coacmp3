<?php

namespace App\Library;

use App\Models\Group;
use App\Models\GroupActing;
use App\Models\Modality;

class ManageActings
{
    public static function insertActings(array $actings): bool
    {
        if (! $actings) {
            return false;
        }

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
                $group->modality_id = Modality::where('name', $acting['modality'])->first()->id;

                //Scrapping group info
                $groupInfo = SearchGroupInfo::getGroupInfo($group->name);

                $group->save();
            }

            $groupActing = new GroupActing();
            $groupActing->phase = $acting['phase'];
            $groupActing->filename = $acting['filename'];
            $groupActing->group_id = $group->id;
            $groupActing->save();

        }

        return true;
    }
}
