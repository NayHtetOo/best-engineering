<?php

use App\Http\Controllers\BrickworkController;
use App\Http\Controllers\BrickworkHeadController;
use App\Http\Controllers\CementConcretingworkController;
use App\Http\Controllers\ConcretingworkController;
use App\Http\Controllers\ConcretingworkHeadController;
use App\Http\Controllers\EarthworkHeadController;
use App\Http\Controllers\LandTypeController;
use App\Http\Controllers\MixedTypeController;
use App\Http\Controllers\RatioTypeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ThicknessTypeController;
use App\Http\Controllers\WorkTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/worktype',[WorkTypeController::class,'workType'])->name('worktype.index');
Route::get('/landtype',[LandTypeController::class,'landType'])->name('landtype.index');
Route::get('/thicknesstype',[ThicknessTypeController::class,'thicknessType'])->name('thicknesstype.index');
Route::get('/ratiotype',[RatioTypeController::class,'ratioType'])->name('ratiotype.index');
Route::get('/mixedtype',[MixedTypeController::class,'mixedType'])->name('mixedtype.index');
Route::get('/brickwork',[BrickworkController::class,'brickwork'])->name('brickwork.index');
Route::get('/concretingwork',[ConcretingworkController::class,'concretingWork'])->name('concretingwork.index');
Route::get('/site',[SiteController::class,'site'])->name('site.index');

// Earthwork Head
Route::get('/earthworkhead',[EarthworkHeadController::class,'index'])->name('earthworkhead.index');
Route::get('/earthworkhead/create',[EarthworkHeadController::class,'create'])->name('earthworkhead.create');

Route::get('/brickworkhead',[BrickworkHeadController::class,'brickworkHead'])->name('brickworkhead.index');
Route::get('/concretingworkhead',[ConcretingworkHeadController::class,'concretingworkHead'])->name('concretingworkhead.index');
Route::get('/cementconcretingwork',[CementConcretingworkController::class,'cementConcretingwork'])->name('cementconcretingwork.index');
