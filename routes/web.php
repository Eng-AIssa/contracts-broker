<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\ProfileController;
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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource("contract", ContractController::class);
    Route::post("confirmContract/{contract}", [ContractController::class, 'confirm'])->name('contract.confirm');
    Route::resource("owner", OwnerController::class);
    Route::resource("sector", SectorController::class);
    Route::get('process-success', function () {
        return view('success-response');
    })->name('succeeded');
});

Route::view('success', 'success-response');


