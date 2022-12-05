<?php


use App\Http\Controllers\TokoController;
use App\Http\Controllers\RotiController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;



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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/toko', [TokoController::class, 'index'])->name('toko.index');
    Route::get('/toko/add', [TokoController::class, 'create'])->name('toko.create');
    Route::post('/toko/store', [TokoController::class, 'store'])->name('toko.store');
    Route::get('/toko/edit/{id}', [TokoController::class, 'edit'])->name('toko.edit');
    Route::post('/toko/update/{id}', [TokoController::class, 'update'])->name('toko.update');
    Route::post('/toko/delete/{id}', [TokoController::class, 'delete'])->name('toko.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/roti', [RotiController::class, 'index'])->name('roti.index');
    Route::get('/roti/add', [RotiController::class, 'create'])->name('roti.create');
    Route::post('/rotistore', [RotiController::class, 'store'])->name('roti.store');
    Route::get('/rotiedit/{id}', [RotiController::class, 'edit'])->name('roti.edit');
    Route::post('/rotiupdate/{id}', [RotiController::class, 'update'])->name('roti.update');
    Route::post('/rotidelete/{id}', [RotiController::class, 'delete'])->name('roti.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
});