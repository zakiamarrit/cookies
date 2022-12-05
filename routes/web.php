<?php


use App\Http\Controllers\TokoController;
use App\Http\Controllers\RotiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RiwayatController;
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
    Route::post('/roti/store', [RotiController::class, 'store'])->name('roti.store');
    Route::get('/roti/edit/{id}', [RotiController::class, 'edit'])->name('roti.edit');
    Route::post('/roti/update/{id}', [RotiController::class, 'update'])->name('roti.update');
    Route::post('/roti/delete/{id}', [RotiController::class, 'delete'])->name('roti.delete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('/riwayat/add', [RiwayatController::class, 'create'])->name('riwayat.create');
    Route::post('/riwayat/store', [RiwayatController::class, 'store'])->name('riwayat.store');
    Route::get('/riwayat/edit/{id}', [RiwayatController::class, 'edit'])->name('riwayat.edit');
    Route::post('/riwayat/update/{id}', [RiwayatController::class, 'update'])->name('riwayat.update');
    Route::post('/riwayat/delete/{id}', [RiwayatController::class, 'delete'])->name('riwayat.delete');
});