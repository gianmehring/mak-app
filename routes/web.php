<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\AccesorioController;
use App\Http\Controllers\BijouterieController;
use App\Http\Controllers\LenceriaController;

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

#Articulos
Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos.index');
// Route::get('articulos/{articulos}', [ArticuloController::class, 'show'])->name('articulos.show');
// Route::get('articulos/accesorio/{articulos}', [ArticuloController::class, 'accesorio'])->name('articulos.accesorio');
// Route::get('articulos/bijouterie/{articulos}', [ArticuloController::class, 'bijouterie'])->name('articulos.bijouterie');
// Route::get('articulos/lenceria/{articulos}', [ArticuloController::class, 'lenceria'])->name('articulos.lenceria');

#Accesorios
Route::get('articulos/accesorios', [AccesorioController::class, 'index'])->name('accesorios.index');
Route::get('articulos/accesorios/{accesorio}', [AccesorioController::class, 'show'])->name('accesorios.show');

#Bijouteries
Route::get('articulos/bijouteries', [BijouterieController::class, 'index'])->name('bijouteries.index');
Route::get('articulos/bijouteries/{bijouterie}', [BijouterieController::class, 'show'])->name('bijouteries.show');

#Lencerias
Route::get('articulos/lencerias', [LenceriaController::class, 'index'])->name('lencerias.index');
Route::get('articulos/lencerias/{lenceria}', [LenceriaController::class, 'show'])->name('lencerias.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
