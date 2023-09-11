<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Modality;

class ModalityController extends Controller
{
    public function view($modality = '')
    {
        if(!$modality){
            return ;
        }

        $modality = Modality::where('slug', $modality)->firstOrFail();
        $groups = Group::where(['modality_id' => $modality->id, 'is_featured' => true])->get();

        return view('modality', compact('modality', 'groups'));
    }
}
