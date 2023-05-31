<?php

namespace App\Http\Livewire;

use App\Models\Unit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DynamicUnitsTable extends Component
{
    use WithPagination;


    public string $search = "", $sector = '%';

    protected $units, $sectors;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getUnits()
    {
        $this->units = Unit::query()
            //filter by sector
            ->selectSector($this->sector)
            //search
            ->where(function ($q) {
                $q->searchCode($this->search)
                    ->orWhereHas('owner', function ($q) {
                        $q->searchName($this->search)
                            ->orSearchEmail($this->search);
                    });
            })//select only needed data
            ->select('id', 'code', 'responsible_as', 'owner_id', 'responsible_id', 'sector_id')
            //eager load needed relations
            ->with('owner:id,name,email', 'sector:id,name,userable_id', 'responsible:id,name,email')
            ->paginate(5);

        $this->sectors = User::sector()->limit(4)->get(['id', 'name']);
    }

    public function render()
    {
        $this->getUnits();
        return view('livewire.dynamic-units-table', ['units' => $this->units, 'sectors' => $this->sectors]);
    }
}
