<?php

namespace App\Livewire;

use Livewire\Component;

class SearchComponent extends Component
{
    public $query = '';

    public $groups = [];

    public function mount()
    {
        $this->groups = \App\Models\Group::search($this->query)->take(12)->orderBy('pageviews', 'desc')->get();
    }

    public function updatedQuery()
    {
        if (! $this->query) {
            return $this->mount();
        }
        $this->groups = \App\Models\Group::search($this->query)->orderBy('pageviews', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.search-component');
    }
}
