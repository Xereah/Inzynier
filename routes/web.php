<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KokpitController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CategoryController; 



Route::get('/', function () {
    return view('welcome');
});


Route::name('kokpit.')->prefix('kokpit')->group(function(){
    Route::get('', [KokpitController::class,'index'])
        ->name('index'); 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Produkty
Route::post('/produkty/update', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('updateProduct');
Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
Route::post('/produkty/save', [App\Http\Controllers\ProductController::class, 'storeProduct'])->name('storeProduct');
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

//Kategorie

Route::name('kategorie.')->prefix('kategorie')->group(function(){
    Route::get('', [CategoryController::class,'index'])
        ->name('index');
   Route::get('create',  [CategoryController::class,'create'])
        ->name('create');
    Route::post('',  [CategoryController::class,'store'])
        ->name('store');
    Route::get('{id}',  [CategoryController::class,'show'])
        ->name('show')
       ->where('id', '[0-9]+');
    Route::get('{id}/edit',  [CategoryController::class,'edit'])
        ->name('edit')
        ->where('id', '[0-9]+');
  
});
Route::post('/kategorie/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('store');
Route::get('/kategorie/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('destroy');
Route::post('/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');
