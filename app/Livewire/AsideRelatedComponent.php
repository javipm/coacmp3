<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Group;

class AsideRelatedComponent extends Component
{
    public $groups = [];

    public function mount()
    {
        $this->groups = Group::take(15)->where('year', env('APP_AUDIO_YEAR'))->orderBy('pageviews', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.aside-related-component');
    }
}
