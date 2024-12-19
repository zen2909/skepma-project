<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::resource('certificates', CertificateController::class);

// Route::get('/', function () {
//     return view('welcome');
// });