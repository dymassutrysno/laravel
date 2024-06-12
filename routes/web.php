<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CoursesControler;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;


// route untuk menampilkan teks salam
// 1. GET untuk menampilkan data
// 2. Post untuk mengirim data
// 3. Put untuk mengupdate data
// 4. Delete untuk mneghapus data

Route::get('/', function(){
    return view('wellcome');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// route untuk menampilkan halaman student
Route::get('/admin/student', [StudentController::class, 'index']);

Route::get('/admin/courses', [CoursesControler::class, 'index']);

Route::get('/admin/student/create', [StudentController::class, 'create']);

Route::post('/admin/student/store', [StudentController::class, 'store']);

//route untuk menampilkan halaman form edit student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

//route untuk menyimpan hasil update student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

//route untuk menghapus data student
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);

//route untuk menambah courses
Route::get('/admin/courses/create', [CoursesControler::class, 'create']);

Route::post('/admin/courses/store', [CoursesControler::class, 'store']);

//route untuk mengedit courses
Route::get('admin/courses/edit/{id}', [CoursesControler::class, 'edit']);

Route::put('admin/courses/update/{id}', [CoursesControler::class, 'update']);

//route untuk menghapus data courses
Route::delete('admin/courses/delete/{id}', [CoursesControler::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
