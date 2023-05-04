<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/', 'dashboard');
});


Route::middleware('auth')->group(function () {

    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Contract
    Route::resource("contract", ContractController::class);
    Route::get("contracts/{status}", [ContractController::class, 'indexStatus'])->name('indexStatus');
    Route::get("contract/{contract}/file", [ContractController::class, 'showFile'])->name('showFile');
    Route::post("confirmContract/{contract}", [ContractController::class, 'confirm'])->name('contract.confirm');

    //Unit
    Route::resource("unit", UnitController::class);
    Route::get("units/{status}", [UnitController::class, 'indexBySector'])->name('indexBySector');

    Route::resource("owner", OwnerController::class);
    Route::resource("sector", SectorController::class);


});

Route::view('process-success', 'success-response')->name('succeeded');
