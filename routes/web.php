<?php

use App\Http\Controllers\AppartmentController;
use App\Http\Controllers\WishlistController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductImageController;



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


Route::get('/', [MainController::class, 'landing'])->name('main.landing');
Route::get('/about', [MainController::class, 'about'])->name('main.about');
Route::get('/appartments', [MainController::class, 'appartments'])->name('main.appartments');
Route::get('/appartment/{id}', [MainController::class, 'showAppartment'])->name('main.show.appartment');
Route::get('/developers', [MainController::class, 'developers'])->name('main.developers');
Route::get('/projects', [MainController::class, 'projects'])->name('main.projects');
Route::get('/project/{id}', [MainController::class, 'projectShow'])->name('show.projects');
Route::get('/upload', [MainController::class, 'upload'])->name('main.upload');
Route::get('/services', [MainController::class, 'services'])->name('main.services');
Route::get('/add-to-cache', [WishlistController::class, 'addToCache'])->name('wishlist.addToCache');
Route::get('/delete-from-cache/{id}', [WishlistController::class, 'deleteFromCache'])->name('wishlist.deleteFromCache');
Route::get('/wishlist', [WishlistController::class, 'index']);


Route::post('/contact-store', [ContactController::class, 'store'])->name('contact.index');




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    // Appartment Routes
    Route::get('/admin/appartments', [AppartmentController::class, 'index'])->name('appartments.index');
    Route::post('/admin/appartments/store', [AppartmentController::class, 'store'])->name('appartments.store');
    Route::put('/admin/appartments/{id}/update', [AppartmentController::class, 'update'])->name('appartments.update');
    Route::delete('/admin/appartments/{id}/destroy', [AppartmentController::class, 'destroy'])->name('appartments.destroy');
    
    // Cities Routes
    Route::get('/admin/cities', [CityController::class, 'index'])->name('cities.index');
    Route::post('/admin/cities/store', [CityController::class, 'store'])->name('cities.store');
    Route::put('/admin/cities/{id}/update', [CityController::class, 'update'])->name('cities.update');
    Route::delete('/admin/cities/{id}/destroy', [CityController::class, 'destroy'])->name('cities.destroy');

    // Districts Routes
    Route::get('/admin/districts', [DistrictController::class, 'index'])->name('districts.index');
    Route::post('/admin/districts/store', [DistrictController::class, 'store'])->name('districts.store');
    Route::put('/admin/districts/{id}/update', [DistrictController::class, 'update'])->name('districts.update');
    Route::delete('/admin/districts/{id}/destroy', [DistrictController::class, 'destroy'])->name('districts.destroy');


    // Developer Routes
    Route::get('/admin/developers', [DeveloperController::class, 'index'])->name('developers.index');
    Route::post('/admin/developers/store', [DeveloperController::class, 'store'])->name('developers.store');
    Route::patch('/admin/developers/{id}/update', [DeveloperController::class, 'update'])->name('developers.update');
    Route::delete('/admin/developers/{id}/destroy', [DeveloperController::class, 'destroy'])->name('developers.destroy');

    // Project Route
    Route::get('/admin/projects', [ProjectsController::class, 'index'])->name('projects.index');
    Route::post('/admin/projects', [ProjectsController::class, 'store'])->name('projects.store');
    Route::put('/admin/projects/{id}', [ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('/admin/projects/{id}', [ProjectsController::class, 'destroy'])->name('projects.destroy');

    // Favorite
    Route::get('/admin/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/admin/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::put('/admin/favorites/{favorite}', [FavoriteController::class, 'update'])->name('favorites.update');
    Route::delete('/admin/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');


    // product image

    Route::post('/admin/product_images/{id}', [ProductImageController::class, 'store'])->name('product_images.store');
    Route::delete('/admin/delete/product_images', [ProductImageController::class, 'destroy'])->name('product_images.destroy');

    // contact
    Route::get('admin/contacts', [ContactController::class, 'index'])->name('contact.index');




});
