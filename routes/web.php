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


Route::get('measure', function () {
    dd([
        'dumb' => Illuminate\Support\Benchmark::measure(fn() => DB::table('units')->select('id', 'code')->get()),
        'db select' => Illuminate\Support\Benchmark::measure(fn() => DB::table('units')->select('id', 'code')->get()),
        'db get some' => Illuminate\Support\Benchmark::measure(fn() => DB::table('units')->get(['id', 'code'])),
        'db get all' => Illuminate\Support\Benchmark::measure(fn() => DB::table('units')->get()),
        'dump line' => Illuminate\Support\Benchmark::measure(fn() => '----------------------------------'),
        'model get some' => Illuminate\Support\Benchmark::measure(fn() => App\Models\Unit::get(['id', 'code'])),
        'model all some' => Illuminate\Support\Benchmark::measure(fn() => App\Models\Unit::all(['id', 'code'])),
        'model get all' => Illuminate\Support\Benchmark::measure(fn() => App\Models\Unit::get(['id', 'code'])),
        'model all all' => Illuminate\Support\Benchmark::measure(fn() => App\Models\Unit::all(['id', 'code'])),
        'model select' => Illuminate\Support\Benchmark::measure(fn() => App\Models\Unit::select('id', 'code')->get()),

    ]);
});

Route::get('test', function () {
    $contracts = \App\Models\Contract::take(10)->get()->groupBy('entry_date');

    foreach ($contracts as $contract)
        $contract->count() > 1 ? dd($contract) : 'continue';
});

Route::view('success', 'success-response');

require __DIR__ . '/auth.php';
