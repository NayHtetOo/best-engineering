<?php

use App\Http\Controllers\AdditionalCostController;
use App\Http\Controllers\BrickworkController;
use App\Http\Controllers\BrickworkHeadController;
use App\Http\Controllers\CementConcretingworkController;
use App\Http\Controllers\ConcretingworkController;
use App\Http\Controllers\ConcretingworkHeadController;
use App\Http\Controllers\CostTypeController;
use App\Http\Controllers\EarthworkHeadController;
use App\Http\Controllers\LandTypeController;
use App\Http\Controllers\MixedTypeController;
use App\Http\Controllers\RatioTypeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ThicknessTypeController;
use App\Http\Controllers\WorkTypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     if (Auth::check()) {
//         return redirect('/home');
//     } else {
//         return view('auth.login');
//     }
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/worktype',[WorkTypeController::class,'workType'])->name('worktype.index');
Route::get('/landtype',[LandTypeController::class,'landType'])->name('landtype.index');
Route::get('/thicknesstype',[ThicknessTypeController::class,'thicknessType'])->name('thicknesstype.index');
// Ratio Type
Route::get('/ratiotype',[RatioTypeController::class,'index'])->name('ratiotype.index');
Route::get('/ratiotype/create',[RatioTypeController::class,'create'])->name('ratiotype.create');
Route::post('/ratiotype/store',[RatioTypeController::class,'store'])->name('ratiotype.store');
Route::get('/ratiotype/edit/{id}',[RatioTypeController::class,'edit'])->name('ratiotype.edit');
Route::delete('/ratiotype/delete/{id}',[RatioTypeController::class,'delete'])->name('ratiotype.delete');

Route::get('/mixedtype',[MixedTypeController::class,'mixedType'])->name('mixedtype.index');
Route::get('/costtype',[CostTypeController::class,'costType'])->name('costtype.index');

//Motherboard for brickwork
Route::get('/brickwork',[BrickworkController::class,'index'])->name('brickwork.index');
Route::get('/brickwork/create',[BrickworkController::class,'create'])->name('brickwork.create');
Route::post('/brickwork/store',[BrickworkController::class,'store'])->name('brickwork.store');
Route::get('/brickwork/edit/{id}',[BrickworkController::class,'edit'])->name('brickwork.edit');
Route::delete('/brickwork/delete/{id}',[BrickworkController::class,'delete'])->name('brickwork.delete');


Route::get('/concretingwork',[ConcretingworkController::class,'concretingWork'])->name('concretingwork.index');

// site
Route::get('/site',[SiteController::class,'index'])->name('site.index');
Route::get('/site/create',[SiteController::class,'create'])->name('site.create');
Route::post('/site/store',[SiteController::class,'store'])->name('site.store');
Route::get('/site/edit/{id}',[SiteController::class,'edit'])->name('site.edit');
Route::delete('/site/delete/{id}',[SiteController::class,'delete'])->name('site.delete');
Route::get('/site/show/{id}',[SiteController::class,'show'])->name('site.show');

// Earthwork Head
Route::get('/earthworkhead',[EarthworkHeadController::class,'index'])->name('earthworkhead.index');
Route::get('/earthworkhead/create',[EarthworkHeadController::class,'create'])->name('earthworkhead.create');
Route::post('/earthworkhead/store',[EarthworkHeadController::class,'store'])->name('earthworkhead.store');
Route::get('/earthworkhead/edit/{id}',[EarthworkHeadController::class,'edit'])->name('earthworkhead.edit');
Route::delete('/earthworkhead/delete/{id}',[EarthworkHeadController::class,'delete'])->name('earthworkhead.delete');

// Brickworks Head
Route::get('/brickworkhead',[BrickworkHeadController::class,'index'])->name('brickworkhead.index');
Route::get('/brickworkhead/create',[BrickworkHeadController::class,'create'])->name('brickworkhead.create');
Route::post('/brickworkhead/store',[BrickworkHeadController::class,'store'])->name('brickworkhead.store');
Route::get('/brickworkhead/edit/{id}',[BrickworkHeadController::class,'edit'])->name('brickworkhead.edit');
Route::delete('/brickworkhead/delete/{id}',[BrickworkHeadController::class,'delete'])->name('brickworkhead.delete');

// Concretingworks Head
Route::get('/concretingworkhead',[ConcretingworkHeadController::class,'index'])->name('concretingworkhead.index');
Route::get('/concretingworkhead/create',[ConcretingworkHeadController::class,'create'])->name('concretingworkhead.create');
Route::post('/concretingworkhead/store',[ConcretingworkHeadController::class,'store'])->name('concretingworkhead.store');
Route::get('/concretingworkhead/edit/{id}',[ConcretingworkHeadController::class,'edit'])->name('concretingworkhead.edit');
Route::delete('/concretingworkhead/delete/{id}',[ConcretingworkHeadController::class,'delete'])->name('concretingworkhead.delete');


Route::get('/additionalcost/add/{site_id}',[AdditionalCostController::class,'add'])->name('additionalcost.add');
Route::resource('additionalcost', AdditionalCostController::class);
