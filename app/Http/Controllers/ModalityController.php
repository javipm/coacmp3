<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Modality;

class ModalityController extends Controller
{
    public function list($modality = '')
    {

        if(!$modality){
            return ;
        }
        $modality_id = Modality::where('slug', $modality)->firstOrFail()->id;
        $groups = Group::where('modality_id', $modality_id)->get();

        return view('modality.comparsas');
    }
}
