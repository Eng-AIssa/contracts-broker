<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmContractRequest;
use App\Models\Unit;
use App\Models\Resident;
use App\Models\Contract;
use App\Notifications\verifyOtp;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;


class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$statuses = Contract::toBase()
            ->selectRaw("count(1) as count")
            ->selectRaw("count(case when status = 'معتمد' then 1 end) as confirmed")
            ->selectRaw("count(case when status = 'مراجعة الوسيط' then 1 end) as review")
            ->selectRaw("count(case when status = 'مرفوض' then 1 end) as rejected")
            ->selectRaw("count(case when status = 'اعتماد المستأجر' then 1 end) as resident")
            ->first();

        $contracts = Contract::query()->latest()
            ->withNames()->paginate(5);*/
        $contract_statuses = Contract::CONTRACT_STATUSES;

        return view('contracts.index2', compact('contract_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$units = DB::table('units')->select(['id', 'code'])->get();
        $units = Unit::query()->select('id', 'code')->get();

        return view('contracts.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request)
    {
        $data = $request->validated();

        try {
            DB::transaction(function () use ($data) {

                $unit = Unit::find($data['unit_code']);

                $resident = Resident::create([
                    'name' => $data['resident_name'],
                    'id_number' => $data['resident_id'],
                    'email' => $data['resident_email'],
                    'nationality' => $data['resident_nationality']
                ]);

                $contract = Contract::create([
                    'owner_id' => $unit->owner_id,
                    'unit_id' => $unit->id,
                    'resident_id' => $resident->id,
                    'entry_date' => $data['entry_date'],
                    'leaving_date' => $data['leaving_date'],
                    'rental_fees' => $data['rental_fees'],
                    'status' => Contract::RESIDENT,
                    'otp' => rand(1000, 9999),
                    'created_by' => auth()->id(),
                    'contract_fees' => Contract::FEES
                ]);

                $owner = $unit->owner;
                $owner->residents()->attach($resident);

                $resident->notify(new verifyOtp($contract->id, $contract->otp));
            });
        } catch (\Exception $e) {
            return view('message-response',
                ['message' => 'Something went wrong due to duplication, kindly check contract existence before retrying again.']);
        }

        return redirect()->route('succeeded');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return view('contracts.show', compact("contract"));
    }

    /**
     * Display the specified resource file.
     */
    public function showFile(Contract $contract)
    {
        return view('contracts.draft', compact("contract"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        $units = Unit::query()->select('id', 'code')->get();
        return view('contracts.update', compact('contract', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $contract) {

            $resident = $contract->resident->update([
                'name' => $data['resident_name'],
                'id_number' => $data['resident_id'],
                'email' => $data['resident_email'],
                'nationality' => $data['resident_nationality']
            ]);

            $contract = $contract->update([
                'unit_id' => $data['unit_code'],
                'entry_date' => $data['entry_date'],
                'leaving_date' => $data['leaving_date'],
                'rental_fees' => $data['rental_fees'],
            ]);
        });

        return redirect()->route('succeeded');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }

    /**
     * Confirm Contract from Resident
     */
    public function confirm(confirmContractRequest $request, Contract $contract)
    {
        $contract->update([
            'status' => Contract::BROKER,
            'otp' => null,
        ]);

        return redirect()->route('succeeded')->with('message', 'Thank you, have a good day');
    }
}
