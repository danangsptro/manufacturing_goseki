<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\HasilProduksiController;
use App\Http\Controllers\Backend\JadwalProduksiController;
use App\Http\Controllers\Backend\JamProduksiController;
use App\Http\Controllers\Backend\LaporanController;
use App\Http\Controllers\Backend\MesinProduksiController;
use App\Http\Controllers\Backend\OperatorController;
use App\Http\Controllers\Backend\ProblemProduksiController;
use App\Http\Controllers\Backend\ProdukController;
use App\Http\Controllers\Backend\ProsesController;
use App\Http\Controllers\Backend\RegisterUserController;
use App\Http\Controllers\Backend\TargetController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (!Auth::check()) {
        return view('auth.login');
    }
    return redirect(url('/dashboard'));
});


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Register
        Route::get('/register', [RegisterUserController::class, 'index'])->name('register');
        Route::post('/edit-profile/{id}', [RegisterUserController::class, 'editProfile'])->name('edit-profile');
        Route::post('/update-password/{id}', [RegisterUserController::class, 'updatePassword'])->name('update-password');
        Route::get('/profile', [RegisterUserController::class, 'profile'])->name('profile');
        Route::post('/create-user', [RegisterUserController::class, 'store'])->name('store-user');
        Route::delete('/delete-user/{id}', [RegisterUserController::class, 'deleteUser'])->name('delete-user');
        Route::get('/edit-account-user/{id}', [RegisterUserController::class, 'editAccountUser'])->name('edit-account-user');
        // Mesin Produksi
        Route::get('/mesin-produksi', [MesinProduksiController::class, 'index'])->name('mesin');
        Route::get('/create-mesin-produksi', [MesinProduksiController::class, 'create'])->name('mesin-create');
        Route::post('/store-mesin', [MesinProduksiController::class, 'store'])->name('store-mesin');
        Route::get('/edit-mesin/{id}', [MesinProduksiController::class, 'edit'])->name('edit-mesin');
        Route::put('/update-mesin/{id}', [MesinProduksiController::class, 'update'])->name('update-mesin');
        Route::delete('/delete-mesin/{id}', [MesinProduksiController::class, 'delete'])->name('delete-mesin');
        // Operator
        Route::get('/operator', [OperatorController::class, 'index'])->name('operator');
        Route::get('/create-operator', [OperatorController::class, 'create'])->name('create-operator');
        Route::post('/store-operator', [OperatorController::class, 'store'])->name('store-operator');
        Route::get('/edit-operator/{id}', [OperatorController::class, 'edit'])->name('edit-operator');
        Route::put('/update-operator/{id}', [OperatorController::class, 'update'])->name('update-operator');
        Route::delete('/delete-operator/{id}', [OperatorController::class, 'delete'])->name('delete-operator');
        // Produk
        Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
        Route::get('/create-produk', [ProdukController::class, 'create'])->name('create-produk');
        Route::post('/store-produk', [ProdukController::class, 'store'])->name('store-produk');
        Route::get('/edit-produk/{id}', [ProdukController::class, 'edit'])->name('edit-produk');
        Route::put('/update-produk/{id}', [ProdukController::class, 'update'])->name('update-produk');
        Route::delete('/delete-produk/{id}', [ProdukController::class, 'delete'])->name('delete-produk');
        // Proses
        Route::get('/proses', [ProsesController::class, 'index'])->name('proses');
        Route::get('/create-proses', [ProsesController::class, 'create'])->name('create-proses');
        Route::post('/store-proses', [ProsesController::class, 'store'])->name('store-proses');
        Route::get('/edit-proses/{id}', [ProsesController::class, 'edit'])->name('edit-proses');
        Route::put('/update-proses/{id}', [ProsesController::class, 'update'])->name('update-proses');
        Route::delete('/delete-proses/{id}', [ProsesController::class, 'delete'])->name('delete-proses');
        // Hasil Produksi
        Route::get('/hasil-produksi', [HasilProduksiController::class, 'index'])->name('hasil-produksi');
        Route::get('/create-hasil-produksi', [HasilProduksiController::class, 'create'])->name('create-hasil-produksi');
        Route::post('/store-hasil-produksi', [HasilProduksiController::class, 'store'])->name('store-hasil-produksi');
        Route::get('/edit-hasil-produksi/{id}', [HasilProduksiController::class, 'edit'])->name('edit-hasil-produksi');
        Route::put('/update-hasil-produksi/{id}', [HasilProduksiController::class, 'update'])->name('update-hasil-produksi');
        Route::delete('/delete-hasil-produksi/{id}', [HasilProduksiController::class, 'delete'])->name('delete-hasil-produksi');
        // Problem Produksi
        Route::get('/problem-produksi', [ProblemProduksiController::class, 'index'])->name('problem-produksi');
        Route::get('/create-problem-produksi', [ProblemProduksiController::class, 'create'])->name('create-problem-produksi');
        Route::post('/store-problem-produksi', [ProblemProduksiController::class, 'store'])->name('store-problem-produksi');
        Route::get('/edit-problem-produksi/{id}', [ProblemProduksiController::class, 'edit'])->name('edit-problem-produksi');
        Route::put('/update-problem-produksi/{id}', [ProblemProduksiController::class, 'update'])->name('update-problem-produksi');
        Route::delete('/delete-problem-produksi/{id}', [ProblemProduksiController::class, 'delete'])->name('delete-problem-produksi');
        // Jam Produksi
        Route::get('/jadwal-produksi', [JadwalProduksiController::class, 'index'])->name('jadwal-produksi');
        Route::get('/create-jadwal-produksi', [JadwalProduksiController::class, 'create'])->name('create-jadwal-produksi');
        Route::post('/store-jadwal-produksi', [JadwalProduksiController::class, 'store'])->name('store-jadwal-produksi');
        Route::get('/edit-jadwal-produksi/{id}', [JadwalProduksiController::class, 'edit'])->name('edit-jadwal-produksi');
        Route::put('/update-jadwal-produksi/{id}', [JadwalProduksiController::class, 'update'])->name('update-jadwal-produksi');
        Route::delete('/delete-jadwal-produksi/{id}', [JadwalProduksiController::class, 'destroy'])->name('delete-jadwal-produksi');
        // Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/hasil-produksi', [LaporanController::class, 'hp'])->name('laporan-produksi');
        Route::get('/laporan/search-hasil-produksi/{type}', [LaporanController::class, 'search'])->name('search-laporan');
        Route::get('/laporan/cetak-hasil-produksi/{type}', [LaporanController::class, 'printHasilProduksi'])->name('cetak-laporan-produksi');
        Route::get('/laporan/problem-produksi', [LaporanController::class, 'pp'])->name('laporan-problem-produksi');
        // Target Jam
        Route::get('/target-jam', [TargetController::class, 'index'])->name('target-jam');
        Route::get('/create-target-jam', [TargetController::class, 'create'])->name('create-target-jam');
        Route::post('/store-target-jam', [TargetController::class, 'store'])->name('store-target-jam');
        Route::get('/edit-target-jam/{id}', [TargetController::class, 'edit'])->name('edit-target-jam');
        Route::put('/update-target-jam/{id}', [TargetController::class, 'update'])->name('update-target-jam');
        Route::delete('/delete-target-jam/{id}', [TargetController::class, 'delete'])->name('delete-target-jam');
    });
});
