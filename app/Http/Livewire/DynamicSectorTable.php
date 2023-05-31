<?php

namespace App\Http\Livewire;

use App\Models\Sector;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DynamicSectorTable extends Component
{
    use WithPagination;

    public string $search = "";

    protected $sectors;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getSectors()
    {
        $this->sectors = Sector::query()
            //search
            ->where(function ($q) {
                $q->searchManagerPhone($this->search)
                    ->orSearchRegisterNumber($this->search)
                    ->orWhereHas('user', function ($q) {
                        $q->searchName($this->search)->orSearchEmail($this->search);
                    });;
            })//select only needed data
            ->select('id', 'code', 'registration_number', 'fees', 'manager_name', 'manager_phone', 'manager_id')
            ->withFullInfo()->paginate(5);
    }

    public function render()
    {
        $this->getSectors();
        return view('livewire.dynamic-sector-table', ['sectors' => $this->sectors]);
    }
}
