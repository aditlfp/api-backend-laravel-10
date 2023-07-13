<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesananUserController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth')->group(function() {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::resource('/pesanan-user', PesananUserController::class);
});


Route::middleware('auth', 'admin')->group(function(){
    Route::patch('/approve/{id}', [MasterController::class, 'approve'])->name('approve');
    Route::patch('/prosses/{id}', [MasterController::class, 'prosess'])->name('prosses');
    Route::patch('/cancelled/{id}', [MasterController::class, 'cancelled'])->name('cancelled');
    Route::resource('/barang', BarangController::class);
    Route::resource('/mitra', MitraController::class);
    Route::resource('/pesanan', PesananController::class);
    Route::resource('/satuan', SatuanController::class);
    Route::resource('/status', StatusController::class);

});

require __DIR__.'/auth.php';

