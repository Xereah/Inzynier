<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KokpitController; 
use App\Http\Controllers\ProductController; 



Route::get('/', function () {
    return view('welcome');
});


Route::name('kokpit.')->prefix('kokpit')->group(function(){
    Route::get('', [KokpitController::class,'index'])
        ->name('index'); 
});



Route::name('produkt.')->prefix('produkt')->group(function(){
    Route::get('', [ProductController::class,'index'])
        ->name('index');
   Route::get('create',  [ProductController::class,'create'])
        ->name('create');
    Route::post('',  [ProductController::class,'store'])
        ->name('store');
    Route::get('{id}',  [ProductController::class,'show'])
        ->name('show')
       ->where('id', '[0-9]+');
    Route::get('{id}/edit',  [ProductController::class,'edit'])
        ->name('edit')
        ->where('id', '[0-9]+');    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Produkty
Route::post('/produkty/update', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('updateProduct');
Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
Route::post('/produkty/save', [App\Http\Controllers\ProductController::class, 'storeProduct'])->name('storeProduct');