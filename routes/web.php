<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KokpitController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\GospodarstwoController;
use App\Http\Controllers\ZamowieniaKlientController;

Route::get('/' , [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::name('kokpit.')->prefix('kokpit')->group(function(){
    Route::get('', [KokpitController::class,'index'])
        ->name('index')->middleware(['permission:update']);; 
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
Route::post('/kategorie/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('store');
Route::get('/kategorie/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('destroy');
Route::post('/kategorie/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('update');
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


//Uzytkownicy

Route::name('uzytkownik.')->prefix('uzytkownik')->group(function(){
    Route::get('', [UserController::class,'index'])
        ->name('index');
   Route::get('create',  [UserController::class,'create'])
        ->name('create');
    Route::post('',  [UserController::class,'store'])
        ->name('store');
    Route::get('{id}',  [UserController::class,'show'])
        ->name('show')
       ->where('id', '[0-9]+');
    Route::get('{id}/edit',  [UserController::class,'edit'])
        ->name('edit')
        ->where('id', '[0-9]+');
 Route::post('{id}',  [UserController::class,'update'])
        ->name('update')
        ->where('id', '[0-9]+');
  
   Route::get('/uzytkownik/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
   Route::post('/storeguest', [App\Http\Controllers\UserController::class, 'storeguest'])->name('storeguest');
       
});



// Kalendarz
Route::name('task.')->prefix('task')->group(function(){
    Route::get('', [TasksController::class,'index'])
        ->name('index');
   Route::get('create',  [TasksController::class,'create'])
        ->name('create');
    Route::post('',  [TasksController::class,'store'])
        ->name('store');
    Route::get('{id}',  [TasksController::class,'show'])
        ->name('show')
       ->where('id', '[0-9]+');
    Route::get('{id}/edit',  [TasksController::class,'edit'])
        ->name('edit')
        ->middleware(['auth'])
        ->where('id', '[0-9]+');
   Route::patch('{id}',  [TasksController::class,'update'])
        ->name('update')
        ->where('id', '[0-9]+');
    Route::delete('{id}',  [TasksController::class,'destroy'])
        ->name('destroy')
       ->where('id', '[0-9]+');
    Route::get('/show/{id}', [App\Http\Controllers\TasksController::class, 'showtask'])->name('showtask');
});
// strona główna
Route::name('index.')->prefix('index')->group(function(){
    Route::get('', [FrontEndController::class,'index'])
        ->name('index');
   Route::get('create',  [FrontEndController::class,'create'])
        ->name('create');
    Route::post('',  [FrontEndController::class,'store'])
        ->name('store');
    Route::get('{id}',  [FrontEndController::class,'show'])
        ->name('show')
       ->where('id', '[0-9]+');
    Route::get('{id}/edit',  [FrontEndController::class,'edit'])
        ->name('edit')
        ->middleware(['auth'])
        ->where('id', '[0-9]+');
   Route::patch('{id}',  [FrontEndController::class,'update'])
        ->name('update')
        ->where('id', '[0-9]+');
    Route::delete('{id}',  [FrontEndController::class,'destroy'])
        ->name('destroy')
       ->where('id', '[0-9]+');
});


//Gospodarstwo
Route::post('/gospodarstwo/store', [App\Http\Controllers\GospodarstwoController::class, 'store'])->name('store');
Route::get('/gospodarstwo/delete/{id}', [App\Http\Controllers\GospodarstwoController::class, 'destroy'])->name('destroy');
Route::post('/gospodarstwo/{id}', [App\Http\Controllers\GospodarstwoController::class, 'update'])->name('update');

Route::name('gospodarstwo.')->prefix('gospodarstwo')->group(function(){
    Route::get('', [GospodarstwoController::class,'index'])
        ->name('index');
   Route::get('create',  [GospodarstwoController::class,'create'])
        ->name('create');
    Route::get('{id}',  [GospodarstwoController::class,'show'])
        ->name('show')
       ->where('id', '[0-9]+');
    Route::get('{id}/edit',  [GospodarstwoController::class,'edit'])
        ->name('edit')
        ->middleware(['auth'])
        ->where('id', '[0-9]+');
   Route::patch('{id}',  [GospodarstwoController::class,'update'])
        ->name('update')
        ->where('id', '[0-9]+');
});

//tabela z dynamicznymi kategoriami
Route::get('produkty/kategorie/{id}', [App\Http\Controllers\FrontEndController::class, 'kategorie'])->name('kategorie');
//wyszukiwanie
Route::get('search', [App\Http\Controllers\FrontEndController::class, 'wyszukiwanie'])->name('wyszukiwanie');
Route::get('searchprice', [App\Http\Controllers\FrontEndController::class, 'wyszukiwaniecena'])->name('wyszukiwaniecena');
//edycja zalogowanego uzytkownika
Route::get('/uzytkownik/profil', [App\Http\Controllers\UserController::class, 'UzytkownikProfil'])->name('UzytkownikProfil');
Route::get('/uzytkownik/edit-profile', [App\Http\Controllers\UserController::class, 'EdycjaProfiluUzytkownika'])->name('EdycjaProfiluUzytkownika');
Route::post('/uzytkownik/update-profile', [App\Http\Controllers\UserController::class, 'AktualizacjaProfiluUzytkownika'])->name('AktualizacjaProfiluUzytkownika');
Route::get('/uzytkownik/password-change', [App\Http\Controllers\UserController::class, 'ZmianaHaslaUzytkownika'])->name('ZmianaHaslaUzytkownika');
Route::post('/uzytkownik/password-update', [App\Http\Controllers\UserController::class, 'AktualizacjaHaslaUzytkownika'])->name('AktualizacjaHaslaUzytkownika');

//koszyk
Route::middleware(['auth'])->group(function() {
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('index');
Route::get('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'dodawaniedokarty'])->name('dodawaniedokarty');
Route::get('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'usuwaniezkarty'])->name('usuwaniezkarty');
Route::get('/cart/update', [App\Http\Controllers\CartController::class, 'aktualizacjakarty'])->name('aktualizacjakarty');

Route::get('/cart/zwieksz/{id}', [App\Http\Controllers\CartController::class, 'zwiekszilosc'])->name('zwiekszilosc');
Route::get('/cart/zmniejsz/{id}', [App\Http\Controllers\CartController::class, 'zmniejszilosc'])->name('zmniejszilosc');

//dane do przesyłki
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('index');
Route::post('/checkout/save-shipping', [App\Http\Controllers\CheckoutController::class, 'ZapisInformacjiOKupujacym'])->name('ZapisInformacjiOKupujacym');

//płatność
Route::get('order/payment', [App\Http\Controllers\ZamowieniaController::class, 'MetodyPlatnosci'])->name('MetodyPlatnosci');
Route::get('order/payment/online', [App\Http\Controllers\ZamowieniaController::class, 'online'])->name('online');
Route::post('order/save-order', [App\Http\Controllers\ZamowieniaController::class, 'InformacjeZamowienie'])->name('InformacjeZamowienie');
Route::get('/order/order-success', [App\Http\Controllers\ZamowieniaController::class, 'ZamowienieSukces'])->name('ZamowienieSukces');
});

//zamowienia
Route::get('/zamowienia', [App\Http\Controllers\ZamowieniaAdminController::class, 'index'])->name('index');
Route::get('/zamowienie/delete/{id}', [App\Http\Controllers\ZamowieniaAdminController::class, 'UsunZamowienie'])->name('UsunZamowienie');
Route::get('/zamowienie/edit/{id}', [App\Http\Controllers\ZamowieniaAdminController::class, 'edycjaZamowienia'])->name('edycjaZamowienia');
Route::get('/zamowienie/podglad/{id}', [App\Http\Controllers\ZamowieniaAdminController::class, 'podgladZamowienia'])->name('podgladZamowienia');

//menu
Route::get('produkty/menu', [App\Http\Controllers\FrontEndController::class, 'ProduktyMenu'])->name('ProduktyMenu');

//klient zamowienia podglad
Route::get('/uzytkownik/zamowienia', [App\Http\Controllers\ZamowieniaKlientController::class, 'index'])->name('index');
Route::get('/uzytkownik/zamowienia/szczegoly/{id}', [App\Http\Controllers\ZamowieniaKlientController::class, 'podgladZamowienia'])->name('podgladZamowienia');


