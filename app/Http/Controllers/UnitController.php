<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Sector;
use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$units = Unit::query()->latest()
            ->WithFullInfo()->paginate(5);
        $sectors = User::query()->where('userable_type', 'App\Models\Sector')->select('id', 'name')->get();*/

        return view('units.index'/*, compact('units', 'sectors')*/);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()->select('id', 'name', 'userable_type')->get()->groupBy('userable_type');
        $owners = $users->get('App\Models\Owner');
        $sectors = $users->get('App\Models\Sector');
        $responsibility_forms = Unit::RESPONSIBILITY_FORMS;

        return view('units.create', compact('owners', 'sectors', 'responsibility_forms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request)
    {
        $data = $request->validated();

        Unit::create([
            'code' => $data['unit_code'],
            'sector_id' => $data['sector'],
            'owner_id' => $data['owner'],
            'responsible_id' => $data['responsible'],
            'responsible_as' => $data['responsible_as'],
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('succeeded');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return view('units.show', compact("unit"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        $users = User::query()->select('id', 'name', 'userable_type')->get()->groupBy('userable_type');
        $owners = $users->get('App\Models\Owner');
        $sectors = $users->get('App\Models\Sector');
        $responsibility_forms = Unit::RESPONSIBILITY_FORMS;

        return view('units.update', compact('unit', 'owners', 'sectors', 'responsibility_forms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $data = $request->validated();

        $unit->update([
            'code' => $data['unit_code'],
            'sector_id' => $data['sector'],
            'owner_id' => $data['owner'],
            'responsible_id' => $data['responsible'],
            'responsible_as' => $data['responsible_as'],
        ]);

        return redirect()->route('succeeded');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
