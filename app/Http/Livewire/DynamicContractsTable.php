<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use Livewire\Component;
use Livewire\WithPagination;
use function Symfony\Component\String\s;

class DynamicContractsTable extends Component
{

    use WithPagination;


    public string $search = "", $status = '%';
    public $contract_statuses;
    protected $contracts, $statuses;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getContracts()
    {
        $this->contracts = $contracts = Contract::query()
            //filter by status
            ->selectStatus($this->status)
            //search
            ->where(function ($q) {
                $q->searchId($this->search)->orSearchEntryDate($this->search)
                    ->orWhereHas('unit', function ($q) {
                        $q->searchCode($this->search);
                    })->orWhereHas('owner', function ($q) {
                        $q->searchName($this->search)
                            ->orSearchEmail($this->search);
                    });
            })
            ->latest()->withNames()->paginate(5);

        $this->statuses = Contract::toBase()
            ->selectRaw("count(1) as count")
            ->selectRaw("count(case when status = 'معتمد' then 1 end) as confirmed")
            ->selectRaw("count(case when status = 'مراجعة الوسيط' then 1 end) as review")
            ->selectRaw("count(case when status = 'مرفوض' then 1 end) as rejected")
            ->selectRaw("count(case when status = 'اعتماد المستأجر' then 1 end) as resident")
            ->first();
    }

    /**
     * Get the count for giving status if it was chosen.
     */
    public function statusCount($value)
    {
        switch ($value) {
            case 'Confirmed':
                return '- ' . $this->statuses->confirmed;
            case 'Rejected':
                return '- ' . $this->statuses->rejected;
            case 'Resident Confirm':
                return '- ' . $this->statuses->resident;
            case 'Broker Review':
                return '- ' . $this->statuses->review;
        }
    }

    public function render()
    {
        $this->getContracts();
        return view('livewire.dynamic-contracts-table',
            [
                'contracts' => $this->contracts,
                'contract_statuses' => $this->contract_statuses,
                'statuses' => $this->statuses
            ]
        );
    }
}
