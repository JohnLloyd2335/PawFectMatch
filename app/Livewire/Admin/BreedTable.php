<?php

namespace App\Livewire\Admin;

use App\Models\Breed;
use App\Models\Species;
use Livewire\Component;
use Livewire\WithPagination;

class BreedTable extends Component
{
    use WithPagination;

    public $search;
    public $species_id ;

    public function render()
    {
        $breedsQuery = Breed::where('name', 'like', '%' . $this->search . '%')
        ->orderBy('created_at', 'desc');
    
        if (!empty($this->species_id)) {
            $breedsQuery->where('species_id', $this->species_id);
        }
        
        $breeds = $breedsQuery->paginate(5);

        $species = Species::pluck('name','id')->toArray();
        return view('livewire.admin.breed-table',compact('breeds','species'));
    }
}
