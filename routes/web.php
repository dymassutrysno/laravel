<?php

use App\Http\Controllers\CoursesControler;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
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

// route untuk menampilkan halaman student
Route::get('/admin/student', [StudentController::class, 'index']);

Route::get('/admin/courses', [CoursesControler::class, 'index']);
