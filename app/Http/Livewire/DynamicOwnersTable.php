<?php

namespace App\Http\Livewire;

use App\Models\Owner;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DynamicOwnersTable extends Component
{
    use WithPagination;

    public string $search = "";

    protected $owners;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getOwners()
    {
        $this->owners = User::owner()
            //search
            ->where(function ($q) {
                $q->searchName($this->search)->orSearchEmail($this->search)
                    ->orWhereHasMorph('userable', [Owner::class], function ($q) {
                        $q->searchIdNumber($this->search)->orSearchPhone($this->search);
                    });
            })->select('id', 'name', 'email')
            //get additional needed information from other tables
            ->withFullOwnerInfo()->withLastContractId()
            //eager load owner units
            ->with('units:id,code,owner_id')->paginate(5);
    }

    public function render()
    {
        $this->getOwners();
        return view('livewire.dynamic-owners-table', ['owners' => $this->owners]);
    }
}



