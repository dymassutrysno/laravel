<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// route untuk menampilkan teks salam
// 1. GET untuk menampilkan data
// 2. Post untuk mengirim data
// 3. Put untuk mengupdate data
// 4. Delete untuk mneghapus data

Route::get('/', function(){
    return view('wellcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index']);
  