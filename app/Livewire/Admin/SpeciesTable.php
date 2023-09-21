<?php

namespace App\Livewire\Admin;

use App\Models\Species;
use Livewire\Component;
use Livewire\WithPagination;

class SpeciesTable extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $species = Species::where('name','like','%'.$this->search.'%')->orderBy('created_at','desc')->paginate(5);
        return view('livewire.admin.species-table', compact('species'));
    }
}
