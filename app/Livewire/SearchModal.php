<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;

class SearchModal extends Component
{
    public $query = '';
    public $groups = [];
    public $highlightIndex = 0;


    public function updatedQuery()
    {
        $this->groups = Group::where('name', 'like', '%' . $this->query . '%')
            ->get();
    }


    public function render()
    {
        return view('livewire.search-modal');
    }
}
