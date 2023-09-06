<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupActing;

class GroupActingController extends Controller
{
    public function view(string $group_slug = '', string $phase_slug = ''): \Illuminate\Contracts\View\View
    {
        $group = Group::findBySlugOrFail($group_slug);
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
