<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::get('/', [CertificateController::class, 'index'])->name('certificates.index');

// Menampilkan daftar sertifikat
Route::get('/certificates/list', [CertificateController::class, 'list'])->name('certificates.list');

// Menyimpan sertifikat baru (POST)
Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');

// Menampilkan halaman edit sertifikat
Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit'])->name('certificates.edit');

// Update sertifikat yang ada
Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->name('certificates.update');