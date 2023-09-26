<?php

namespace App\Livewire\Admin;

use App\Models\Breed;
use App\Models\MedicalHistory;
use App\Models\Species;
use Livewire\Component;

class MedicalHistoryTable extends Component
{
    public $search;
    public $species_id;
    public $breed_id;

    public function render()
    {
        $species = Species::pluck('name', 'id')->toArray();
        $breeds = Breed::pluck('name', 'id')->toArray();

        $medicalHistoryQuery = MedicalHistory::query();

        if (!empty($this->search)) {
            $medicalHistoryQuery->whereHas('pet', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->species_id)) {
            $medicalHistoryQuery->whereHas('pet', function ($query) {
                $query->where('species_id', $this->species_id);
            });
        }

        if (!empty($this->breed_id)) {
            $medicalHistoryQuery->whereHas('pet', function ($query) {
                $query->where('breed_id', $this->breed_id);
            });
        }

        $medical_histories = $medicalHistoryQuery->orderBy('id', 'desc')->paginate(5);

        return view('livewire.admin.medical-history-table', compact('species', 'breeds', 'medical_histories'));
    }
}
