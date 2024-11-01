<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\PrisonerController;
use App\Http\Controllers\MeritController;
use App\Http\Controllers\DemeritController;
use App\Http\Controllers\PrisonerTotalPointsController;
use App\Http\Controllers\RehabilitatedPrisonerController;
use App\Http\Controllers\EvaluationController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['prefix' => 'crimes'], function () {
    Route::get('/', [CrimeController::class, 'index'])->name('crimes.index');
    Route::get('/prisoners/{prisoner}', [PrisonerController::class, 'show'])->name('prisoners.show');
    Route::get('/create', [CrimeController::class, 'create'])->name('crimes.create');
    Route::post('/', [CrimeController::class, 'store'])->name('crimes.store');
    Route::get('/{crime}/edit', [CrimeController::class, 'edit'])->name('crimes.edit');
    Route::put('/{crime}', [CrimeController::class, 'update'])->name('crimes.update');
    Route::delete('/{crime}', [CrimeController::class, 'destroy'])->name('crimes.destroy');
});

Route::group(['prefix' => 'prisoners'], function () {
    Route::get('/', [PrisonerController::class, 'index'])->name('prisoners.index');
    Route::get('/create', [PrisonerController::class, 'create'])->name('prisoners.create');
    Route::post('/', [PrisonerController::class, 'store'])->name('prisoners.store');
    Route::get('/{prisoner}/edit', [PrisonerController::class, 'edit'])->name('prisoners.edit');
    Route::put('/{prisoner}', [PrisonerController::class, 'update'])->name('prisoners.update');
    Route::delete('/{prisoner}', [PrisonerController::class, 'destroy'])->name('prisoners.destroy');
});

Route::group(['prefix' => 'merits'], function () {
    Route::get('/', [MeritController::class, 'index'])->name('merits.index');
    Route::get('/merits/{prisonerId}', [MeritController::class, 'show'])->name('merits.show');
    Route::get('/create', [MeritController::class, 'create'])->name('merits.create');
    Route::post('/', [MeritController::class, 'store'])->name('merits.store');
    Route::get('/{merit}/edit', [MeritController::class, 'edit'])->name('merits.edit');
    Route::put('/{merit}', [MeritController::class, 'update'])->name('merits.update');
    Route::delete('/{merit}', [MeritController::class, 'destroy'])->name('merits.destroy');
});

Route::group(['prefix' => 'demerits'], function () {
    Route::get('/', [DemeritController::class, 'index'])->name('demerits.index');
    Route::get('/create', [DemeritController::class, 'create'])->name('demerits.create');
    Route::post('/', [DemeritController::class, 'store'])->name('demerits.store');
    Route::get('/{prisoner}', [DemeritController::class, 'show'])->name('demerits.show'); // Route for showing demerits for individual prisoners
    Route::get('/{demerit}/edit', [DemeritController::class, 'edit'])->name('demerits.edit');
    Route::put('/{demerit}', [DemeritController::class, 'update'])->name('demerits.update');
    Route::delete('/{demerit}', [DemeritController::class, 'destroy'])->name('demerits.destroy');
});

Route::get('/report', [PrisonerTotalPointsController::class, 'index'])->name('prisonertotalpoints.index');

Route::prefix('rehabilitated')->group(function () {
    Route::get('/create', [RehabilitatedPrisonerController::class, 'create'])->name('rehabilitated.create');
    Route::post('/', [RehabilitatedPrisonerController::class, 'store'])->name('rehabilitated.store');
    Route::get('/{rehabilitatedPrisoner}/edit', [RehabilitatedPrisonerController::class, 'edit'])->name('rehabilitated.edit');
    Route::put('/{rehabilitatedPrisoner}', [RehabilitatedPrisonerController::class, 'update'])->name('rehabilitated.update');
    Route::get('/', [RehabilitatedPrisonerController::class, 'index'])->name('rehabilitated.index');
    Route::delete('/rehabilitated/{id}', [RehabilitatedPrisonerController::class, 'destroy'])->name('rehabilitated.destroy');

});

Route::get('/evaluation', [EvaluationController::class, 'index'])->name('evaluation.index');
