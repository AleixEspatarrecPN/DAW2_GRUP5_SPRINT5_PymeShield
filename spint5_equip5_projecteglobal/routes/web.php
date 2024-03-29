<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DevicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RestoreController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ImageDeviceController;
use App\Models\Device;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', HomeController::class, '__invoke');
Route::get('/index', HomeController::class);

// Restaurar
Route::get('/restore', function(){return view('restaurar');});
Route::get('/restaurar',[RestoreController::class, 'devices'])->name('restaurar');
Route::post('/restore/{id}', [RestoreController::class, 'restoreDevice'])->name('restaurar');
Route::get('/restore/{id}', [RestoreController::class, 'getIdDevice'])->name('restaurar');

//Mapa
Route::get('/map', function(){return view('mapa');});


//Mostrar Dispositivos
Route::get('/devices', function(){ return view('listdevices');});
Route::get('/devices/list', [DevicesController::class, 'devices']);
Route::get('/devices/type_devices', [DevicesController::class, 'type_devices']);
Route::post('/devices/create', [DevicesController::class, 'create']);
Route::post('/devices/edit', [DevicesController::class, 'edit']);
//Route::post('/devices/delete', [DevicesController::class, 'delete']);

//Mostrar inventari
Route::get('/inventario', function(){ return view('inventario');});
Route::get('/mapa', function(){ return view('mapa');});

Route::get('/listInventory', [InventoryController::class, 'listInventary']);

// Imatges
Route::get('/imagenes', [ImageDeviceController::class, 'index'])->name('image.index');
Route::post('/imagenes', [ImageDeviceController::class, 'guardar'])->name('image.guardar');
Route::get('/imagenes/{id}', [ImageDeviceController::class, 'mostrar'])->name('image.mostrar');


