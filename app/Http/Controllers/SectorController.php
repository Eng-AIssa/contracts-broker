<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Sector;
use App\Http\Requests\StoreSectorRequest;
use App\Http\Requests\UpdateSectorRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::query()
            ->select('id', 'code', 'registration_number', 'fees', 'manager_name', 'manager_phone', 'manager_id')
            ->with('user:id,userable_type,userable_id,name,email')->paginate(5);

        return view('sectors.index2', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectorRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {

            $sector = Sector::create([
                'code' => $data['code'],
                'registration_number' => $data['registration_number'],
                'fees' => $data['contract_fees'],
                'manager_name' => $data['manager_name'],
                'manager_phone' => $data['manager_phone'],
                'manager_id' => $data['manager_id'],
                'created_by' => auth()->id()
            ]);

            User::create([
                'userable_id' => $sector->id,
                'userable_type' => 'App\Models\sector',
                'name' => $data['sector_name'],
                'email' => $data['manager_email'],
                'password' => Hash::make($data['manager_id']),
            ]);
        });

        return redirect()->route('succeeded');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sector $sector)
    {
        return view('sectors.show', compact("sector"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        return view('sectors.update', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectorRequest $request, Sector $sector)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $sector) {

            $sector->update([
                'code' => $data['code'],
                'registration_number' => $data['registration_number'],
                'fees' => $data['contract_fees'],
                'manager_name' => $data['manager_name'],
                'manager_phone' => $data['manager_phone'],
                'manager_id' => $data['manager_id'],
            ]);

            $sector->user->update([
                'name' => $data['sector_name'],
                'email' => $data['manager_email'],
            ]);
        });

        return redirect()->route('succeeded');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        //
    }
}
