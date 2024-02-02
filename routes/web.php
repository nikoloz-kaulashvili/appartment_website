<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("website/components/appartments");
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    // Cities Routes
    Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
    Route::post('/cities/store', [CityController::class, 'store'])->name('cities.store');
    Route::put('/cities/{id}/update', [CityController::class, 'update'])->name('cities.update');
    Route::delete('/cities/{id}/destroy', [CityController::class, 'destroy'])->name('cities.destroy');

    // Districts Routes
    Route::get('/districts', [DistrictController::class, 'index'])->name('districts.index');
    Route::post('/districts/store', [DistrictController::class, 'store'])->name('districts.store');
    Route::put('/districts/{id}/update', [DistrictController::class, 'update'])->name('districts.update');
    Route::delete('/districts/{id}/destroy', [DistrictController::class, 'destroy'])->name('districts.destroy');
});
