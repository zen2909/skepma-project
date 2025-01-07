<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::get('/', [CertificateController::class, 'index'])->name('certificates.index');

// Menampilkan daftar sertifikat
Route::get('/certificates/list', [CertificateController::class, 'list'])->name('certificates.list');

// Menyimpan sertifikat baru (POST)
Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');

// // Menampilkan halaman edit sertifikat
// Route::get('/certificates/{certificate}/edit', [CertificateController::class, 'edit'])->name('certificates.edit');

// // Update sertifikat yang ada
// Route::put('/certificates/{certificate}', [CertificateController::class, 'update'])->name('certificates.update');

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');


Route::post('/dosen/approve/lomba/{id}', [DosenController::class, 'approve_lomba'])->name('approve.lomba');
Route::post('/dosen/approve/forum/{id}', [DosenController::class, 'approve_forum'])->name('approve.forum');
Route::post('/dosen/approve/pengurus/{id}', [DosenController::class, 'approve_pengurus'])->name('approve.pengurus');
Route::post('/dosen/approve/kegiatan/{id}', [DosenController::class, 'approve_kegiatan'])->name('approve.kegiatan');

Route::post('/dosen/{id}/reject', [DosenController::class, 'reject'])->name('dosen.reject');