<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;

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

Route::get('/', [RegistrasiController::class, 'index']);
Route::post('/proses-registrasi', [RegistrasiController::class, 'prosesRegistrasi']);
Route::get('/hapus-registrasi/{id}', [RegistrasiController::class, 'hapusRegistrasi']);
