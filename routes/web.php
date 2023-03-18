<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('lapor.index');

Route::middleware(['isMasyarakat'])->group(function () {
   Route::post('/store', [UserController::class, 'storePengaduan'])->name('lapor.store');
   Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('lapor.laporan');
   Route::get('/logout', [UserController::class, 'logout'])->name('lapor.logout');
});

Route::middleware(['guest'])->group(function () {
   Route::post('/login/auth', [UserController::class, 'login'])->name('lapor.login');
   Route::get('/register', [UserController::class, 'formRegister'])->name('lapor.formRegister');
   Route::post('/register/auth', [UserController::class, 'register'])->name('lapor.register');
});

Route::prefix('admin')->group(function () {

   Route::middleware(['isAdmin'])->group(function () {
      // Petugas
      Route::resource('petugas', PetugasController::class);
      // Masyarakat
      Route::resource('masyarakat', MasyarakatController::class);
      // Laporan
      Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
      Route::post('getLaporan', [LaporanController::class, 'getLaporan'])->name('laporan.getLaporan');
      Route::get('laporan/cetak/{from}/{to}', [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
   });

   // Petugas bisa ke dashboard, pengaduan dan tanggapan
   Route::middleware(['isPetugas'])->group(function () {
      // Dashboard
      Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
      // Pengaduan
      Route::resource('pengaduan', PengaduanController::class);
      // Tangggapan
      Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');
      // Logout
      Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
   });

   Route::middleware(['guest'])->group(function () {
      Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
      Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
   });
});
