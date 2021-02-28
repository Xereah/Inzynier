<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KokpitController; 



Route::get('/', function () {
    return view('welcome');
});


Route::name('kokpit.')->prefix('kokpit')->group(function(){
    Route::get('', [KokpitController::class,'index'])
        ->name('index');
   Route::get('create',  [KokpitController::class,'create'])
        ->name('create');
    Route::post('',  [KokpitController::class,'store'])
        ->name('store');
    Route::get('{id}',  [KokpitController::class,'show'])
 
        ->name('show')
       ->where('id', '[0-9]+');
    Route::get('{id}/edit',  [KokpitController::class,'edit'])
        ->name('edit')
        ->where('id', '[0-9]+');
   Route::patch('{id}',  [KokpitController::class,'update'])
        ->name('update')
        ->where('id', '[0-9]+');
    Route::delete('{id}',  [KokpitController::class,'destroy'])
        ->name('destroy')
       ->where('id', '[0-9]+');
  
       
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
