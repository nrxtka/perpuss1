<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PetugasLoginController;
use App\Http\Controllers\PeminjamLoginController;
use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataPetugasController;
use App\Http\Controllers\Admin\DataPeminjamController;
use App\Http\Controllers\Peminjam\PeminjamanController;
use App\Http\Controllers\Peminjam\PeminjamController;
use App\Http\Controllers\Petugas\DataBukuController as PetugasBukuController;
use App\Http\Controllers\Admin\DataBukuController as AdminBukuController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;
use App\Http\Controllers\Peminjam\PeminjamController as PeminjamPeminjamanController;
use App\Http\Controllers\Peminjam\RakBukuController;
use App\Http\Controllers\Petugas\PeminjamanController as PetugasPeminjamanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Petugas\KategoriBukuController as PetugasKategoriBukuController;
use App\Http\Controllers\Admin\KategoriBukuController as AdminKategoriBukuController;

// Halaman Pilih
Route::view('/', 'pilih.index')->name('pilih.index');
Route::view('/pilih', 'pilih.index')->name('pilih.index');

// Halaman Login
Route::view('/login/petugas', 'login.petugas')->name('login.petugas');



Route::prefix('peminjam')->group(function () {
    // Login & Register
    Route::get('/login', [PeminjamLoginController::class, 'showLoginForm'])->name('login.peminjam');
    Route::post('/login', [PeminjamLoginController::class, 'login']);
    Route::post('/logout', [PeminjamLoginController::class, 'logout'])->name('peminjam.logout');
    Route::get('/register', [PeminjamLoginController::class, 'showRegisterForm'])->name('register.peminjam');
    Route::post('/register', [PeminjamLoginController::class, 'register']);

    Route::get('/dashboard', [PeminjamController::class, 'dashboard'])->name('peminjam.dashboard');

    // Rak Buku -> Pakai RakBukuController
    Route::get('/rakbuku', [RakBukuController::class, 'index'])->name('peminjam.rakbuku');

    Route::get('/rakbuku/{id}', [RakBukuController::class, 'show'])->name('peminjam.detailbuku');

    // Peminjaman -> Pakai PeminjamanController
    Route::post('/peminjaman/store/{id_buku}', [PeminjamanController::class, 'store'])->name('peminjam.peminjaman.store');
    Route::get('/formpeminjaman/{id_buku}', [PeminjamanController::class, 'formPeminjaman'])->name('peminjam.formpeminjaman');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjam.peminjaman');
    Route::post('/peminjaman', [PeminjamPeminjamanController::class, 'store'])->name('peminjam.storepeminjaman');
    Route::get('/peminjaman/{id}', [PeminjamPeminjamanController::class, 'show'])->name('peminjam.detailpeminjaman');
    Route::post('/peminjaman/{id}/kembali', [PeminjamPeminjamanController::class, 'returnBook'])->name('peminjam.returnpeminjaman');
});
// Admin Login Routes
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AdminLoginController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/petugas/login', [PetugasLoginController::class, 'showLoginForm'])->name('petugas.login');
Route::post('/petugas/login', [PetugasLoginController::class, 'login']);
Route::get('/petugas/logout', [PetugasLoginController::class, 'logout'])->name('petugas.logout');

Route::get('/petugas/dashboard', function () {
    if (!session('petugas')) {
        return redirect()->route('petugas.login');
    }
    return view('petugas.dashboard');
})->name('petugas.dashboard');


// Data Admin Route
Route::prefix('admin')->group(function () {
    Route::get('/dataadmin', [DataAdminController::class, 'index'])->name('admin.dataadmin');
    Route::get('/createadmin', [DataAdminController::class, 'create'])->name('admin.createadmin');
    Route::post('/storeadmin', [DataAdminController::class, 'store'])->name('admin.storeadmin');
    Route::get('/{id}/edit', [DataAdminController::class, 'edit'])->name('admin.editadmin'); 
    Route::put('/{id}/update', [DataAdminController::class, 'update'])->name('admin.updateadmin');
    Route::delete('/{id}', [DataAdminController::class, 'destroy'])->name('admin.deleteadmin');
});

// Data Petugas
Route::prefix('admin')->group(function () {
    Route::get('/datapetugas', [DataPetugasController::class, 'index'])->name('admin.datapetugas');
    Route::get('/createpetugas', [DataPetugasController::class, 'create'])->name('admin.createpetugas');
    Route::post('/storepetugas', [DataPetugasController::class, 'store'])->name('admin.storepetugas');
    Route::get('/editpetugas/{id}', [DataPetugasController::class, 'edit'])->name('admin.editpetugas');
    Route::put('/updatepetugas/{id}', [DataPetugasController::class, 'update'])->name('admin.updatepetugas');
    Route::delete('/deletepetugas/{id}', [DataPetugasController::class, 'destroy'])->name('admin.deletepetugas');
});

Route::prefix('admin')->group(function () {
    Route::get('/datapeminjam', [DataPeminjamController::class, 'index'])->name('admin.datapeminjam');
    Route::get('/datapeminjam/create', [DataPeminjamController::class, 'create'])->name('admin.createpeminjam');
    Route::post('/datapeminjam', [DataPeminjamController::class, 'store'])->name('admin.storepeminjam');
    Route::get('/datapeminjam/{id}/edit', [DataPeminjamController::class, 'edit'])->name('admin.editpeminjam');
    Route::put('/datapeminjam/{id}', [DataPeminjamController::class, 'update'])->name('admin.updatepeminjam');
    Route::delete('/datapeminjam/{id}', [DataPeminjamController::class, 'destroy'])->name('admin.deletepeminjam');
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('databuku', [AdminBukuController::class, 'index'])->name('databuku');
    Route::get('databuku/create', [AdminBukuController::class, 'create'])->name('createbuku');
    Route::post('databuku', [AdminBukuController::class, 'store'])->name('storebuku');
    Route::get('databuku/{id_buku}/edit', [AdminBukuController::class, 'edit'])->name('editbuku');
    Route::put('databuku/{id_buku}', [AdminBukuController::class, 'update'])->name('updatebuku');
    Route::delete('databuku/{id_buku}', [AdminBukuController::class, 'destroy'])->name('deletebuku');
});

Route::prefix('petugas')->name('petugas.')->group(function () {
    Route::get('databuku', [PetugasBukuController::class, 'index'])->name('databuku');
    Route::get('databuku/create', [PetugasBukuController::class, 'create'])->name('createbuku');
    Route::post('databuku', [PetugasBukuController::class, 'store'])->name('storebuku');
    Route::get('databuku/{id_buku}/edit', [PetugasBukuController::class, 'edit'])->name('editbuku');
    Route::put('databuku/{id_buku}', [PetugasBukuController::class, 'update'])->name('updatebuku');
    Route::delete('databuku/{id_buku}', [PetugasBukuController::class, 'destroy'])->name('deletebuku');
});

Route::prefix('admin')->group(function () {
    Route::get('/kategoribuku', [AdminKategoriBukuController::class, 'index'])->name('admin.kategoribuku');
    Route::get('/kategoribuku/create', [AdminKategoriBukuController::class, 'create'])->name('admin.createkategoribuku');
    Route::post('/kategoribuku', [AdminKategoriBukuController::class, 'store'])->name('admin.storekategori');
    Route::get('/kategoribuku/{id}/edit', [AdminKategoriBukuController::class, 'edit'])->name('admin.editkategori');
    Route::put('/kategoribuku/{id}', [AdminKategoriBukuController::class, 'update'])->name('admin.updatekategori');
    Route::delete('/kategoribuku/{id}', [AdminKategoriBukuController::class, 'destroy'])->name('admin.deletekategori');
});

Route::prefix('petugas')->group(function () {
    Route::get('/kategoribuku', [PetugasKategoriBukuController::class, 'index'])->name('petugas.kategoribuku');
    Route::get('/kategoribuku/create', [PetugasKategoriBukuController::class, 'create'])->name('petugas.createkategoribuku');
    Route::post('/kategoribuku', [PetugasKategoriBukuController::class, 'store'])->name('petugas.storekategori');
    Route::get('/kategoribuku/{id}/edit', [PetugasKategoriBukuController::class, 'edit'])->name('petugas.editkategori');
    Route::put('/kategoribuku/{id}', [PetugasKategoriBukuController::class, 'update'])->name('petugas.updatekategori');
    Route::delete('/kategoribuku/{id}', [PetugasKategoriBukuController::class, 'destroy'])->name('petugas.deletekategori');
});

Route::prefix('petugas')->group(function () {
    Route::get('/peminjaman', [PetugasPeminjamanController::class, 'index'])->name('petugas.peminjaman');
    Route::get('/peminjaman/create', [PetugasPeminjamanController::class, 'create'])->name('petugas.createpeminjaman');
    Route::post('/peminjaman/store', [PetugasPeminjamanController::class, 'store'])->name('petugas.storepeminjaman');
    Route::get('/peminjaman/{id}/edit', [PetugasPeminjamanController::class, 'edit'])->name('petugas.editpeminjaman');
    Route::put('/peminjaman/{id}', [PetugasPeminjamanController::class, 'update'])->name('petugas.updatepeminjaman');
    Route::delete('/peminjaman/{id}', [PetugasPeminjamanController::class, 'destroy'])->name('petugas.destroypeminjaman');
});

Route::get('/admin/peminjaman', [AdminPeminjamanController::class, 'index'])->name('admin.peminjaman');


Route::get('/admin/datapetugas', [DataPetugasController::class, 'index'])->name('admin.datapetugas');
Route::get('/admin/index', [DataAdminController::class, 'index'])->name('admin.index');

// Route untuk menampilkan form registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

// Route untuk menyimpan data registrasi
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Admin Index Route (Authenticated Access)
Route::get('/admin/index', function () {
    if (!session()->has('admin')) {
        return redirect()->route('admin.login.form')->with('LoginError', 'Silahkan login dulu!');
    }
    return view('admin.index');
})->name('admin.index');

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/pilih'); // Redirect ke file pilih/index.blade.php
})->name('logout');
