<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Modality;

class ModalityController extends Controller
{
    public function list($modality = '')
    {
        $modality_id = Modality::where('slug', $modality)->first()->id;
        $groups = Group::where('modality_id', $modality_id)->get();

        return view('modality.comparsas');
    }
}
