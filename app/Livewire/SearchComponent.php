<?php

namespace App\Livewire;

use Livewire\Component;

class SearchComponent extends Component
{
    public $query = '';

    public $groups = [];

    public function mount()
    {
        $this->groups = \App\Models\Group::search($this->query)->within('groups_pageviews_desc')->take(12)->orderBy('pageviews', 'desc')->get();
    }

    public function updatedQuery()
    {
        if (! $this->query) {
            return $this->mount();
        }
        $this->groups = \App\Models\Group::search($this->query)->within('groups_pageviews_desc')->orderBy('pageviews', 'desc')->get();
    }

    public function render()
    {
        $this->dispatch('search-completed');

        return view('livewire.search-component');
    }
}
