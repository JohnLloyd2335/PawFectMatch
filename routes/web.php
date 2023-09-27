<?php

use App\Http\Controllers\Admin\AdoptionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SpeciesController as AdminSpeciesController;
use App\Http\Controllers\Admin\BreedController as AdminBreedController;
use App\Http\Controllers\Admin\MedicalHistoryController;
use App\Http\Controllers\Admin\PetController;
use App\Http\Controllers\Adopters\AdoptionsController;
use App\Http\Controllers\Adopters\PetController as AdoptersPetController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){

    
    Route::group(['middleware' => 'adopter'], function(){

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/home/pet/{pet}',[AdoptersPetController::class,'show'])->name('adopters.pet.show');

        Route::get('pet/{pet}/request_adoption', [AdoptionsController::class,'create'])->name('adopters.adoptions.create');
        Route::post('pet/{pet}/request_adoption/store',[AdoptionsController::class,'store'])->name('adopters.adoptions.store');

       
    });

    Route::group(['prefix' => 'admin','middleware' => 'admin'], function(){
        Route::get('dashboard', [DashboardController::class, 'index' ])->name('admin.dashboard');

        Route::resource('pet/species', AdminSpeciesController::class)
        ->only(['index','create','store','edit','update'])
        ->names([
            'index' => 'admin.species.index',
            'create' => 'admin.species.create',
            'store' => 'admin.species.store',
            'edit' => 'admin.species.edit',
            'update' => 'admin.species.update',
        ]);

        Route::resource('pet/breed', AdminBreedController::class)
        ->only(['index','create','store','edit','update'])
        ->names([
            'index' => 'admin.breed.index',
            'create' => 'admin.breed.create',
            'store' => 'admin.breed.store',
            'edit' => 'admin.breed.edit',
            'update' => 'admin.breed.update',
        ]);

        Route::resource('pet', PetController::class)
        ->names([
            'index' => 'admin.pet.index',
            'create' => 'admin.pet.create',
            'show' => 'admin.pet.show',
            'store' => 'admin.pet.store',
            'edit' => 'admin.pet.edit',
            'update' => 'admin.pet.update',
            'destroy' => 'admin.pet.destroy',
        ]);

       Route::resource('medical_history',MedicalHistoryController::class)
       ->only(['index','create','store'])
       ->names([
            'index' => 'admin.pet.medical_history.index',
            'create' => 'admin.pet.medical_history.create',
            'store' => 'admin.pet.medical_history.store',
       ]);
       
       Route::get('adoptions',[AdoptionController::class,'index'])->name('admin.adoptions.index');
       Route::put('adoptions/{adoption}/update', [AdoptionController::class,'update'])->name('admin.adoptions.update');

        
    });

    

});


