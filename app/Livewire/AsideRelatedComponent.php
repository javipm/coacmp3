<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class AsideRelatedComponent extends Component
{
    public $groups = [];

    public function mount()
    {
        $this->groups = Group::take(15)->orderBy('pageviews', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.aside-related-component');
    }
}
