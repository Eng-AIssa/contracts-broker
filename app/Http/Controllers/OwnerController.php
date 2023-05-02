<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Owner;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #Dynamic Column - getting one record/column from HasMany Relationship
        $owners = User::query()
            ->select('id', 'name', 'email')
            ->withFullInfo()->withLastContractId()->with('units:id,code,owner_id')->paginate(5);

        return view('owners.index2', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOwnerRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {

            $owner = Owner::create([
                'id_number' => $data['id_number'],
                'phone' => $data['phone'],
                'created_by' => auth()->id()
            ]);

            User::create([
                'userable_id' => $owner->id,
                'userable_type' => 'App\Models\Owner',
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['id_number']),
            ]);
        });

        return redirect()->route('succeeded');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        return view('owners.update', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        $data = $request->validated();


        DB::transaction(function () use ($data, $owner) {

            $owner->update([
                'id_number' => $data['id_number'],
                'phone' => $data['phone'],
            ]);

            $owner->user->update([
                'name' => $data['name'],
                'email' => $data['email'],
            ]);
        });

        return redirect()->route('succeeded');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
