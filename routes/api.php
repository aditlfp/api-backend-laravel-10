<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PesananController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/barang', BarangController::class);
Route::resource('/mitra', MitraController::class);
Route::resource('/pesanan', PesananController::class);

require __DIR__.'/auth.php';

