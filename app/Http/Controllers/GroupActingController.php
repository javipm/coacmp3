<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupActing;
use App\Models\Modality;

class GroupActingController extends Controller
{
    public function view(string $year = '', string $modality = '', string $group_slug = '', string $phase_slug = ''): \Illuminate\Contracts\View\View
    {
        $modality_id = Modality::where('slug', $modality)->firstOrFail()->id;

        $group = Group::where(['year' => $year, 'modality_id' => $modality_id, 'slug' => $group_slug])->firstOrFail();
        $actings = GroupActing::where(['group_id' => $group->id])->orderBy('created_at', 'asc')->get();
        $actingSelected = GroupActing::where(['group_id' => $group->id, 'phase' => $phase_slug])->first();

        if (! $actingSelected) {
            $actingSelected = $actings[0];
        }

        $initialSong = 0;
        foreach ($actings as $k => $acting) {
            if (strtolower($acting->phase) == $phase_slug) {
                $initialSong = $k;
                break;
            }
        }

        return view('group-acting', compact('group', 'actings', 'actingSelected', 'initialSong'));
    }
}
