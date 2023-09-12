<?php

namespace App\Livewire;

use App\Models\Author;
use App\Models\Group;
use Livewire\Component;

class AsideRelatedComponent extends Component
{
    public $groups = [];

    public $authors = [];

    public function mount()
    {
        $this->groups = Group::take(5)->orderBy('pageviews', 'desc')->get();
        $this->authors = Author::take(5)->orderBy('pageviews', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.aside-related-component');
    }
}
