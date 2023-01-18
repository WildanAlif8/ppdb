<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Models\Pembayaran;

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

Route::get('/', [PendaftaranController::class, 'index'])->name('index');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/create', [PendaftaranController::class, 'register'])->name('pendaftaran');

Route::get('/download/{id}', [PendaftaranController::class, 'downloadPdf'])->name('download');

Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/create', [PendaftaranController::class, 'createAccount'])->name('create.account');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/contact', [AdminController::class, 'ContactUs'])->name('kontak');




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PendaftaranController::class, 'dashboard'])->name('dashboard');
    Route::get('/pembayaran', [PendaftaranController::class, 'pembayaran'])->name('pembayaran');
    Route::post('/pembayaran', [PembayaranController::class, 'pembayaran'])->name('create.pembayaran');
    Route::patch('/pembayaran-update', [PembayaranController::class, 'pembayaran_update'])->name('update');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard-admin', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/pembayaran-admin/{id}', [AdminController::class, 'pembayaran'])->name('pembayaran');
    Route::get('/bukti-pembayaran/{id}', [AdminController::class, 'bukti'])->name('bukti');
    Route::get('/detail-admin', [AdminController::class, 'detail'])->name('detail');
    Route::get('/contact', [AdminController::class, 'contact']);
    Route::patch('/admin-success/{id}', [AdminController::class, 'success']);
    Route::patch('/admin-failed/{id}', [AdminController::class, 'failed']);
});