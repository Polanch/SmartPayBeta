<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/student/home', [StudentController::class, 'home']);
Route::get('/student/transaction', [StudentController::class, 'transaction']);
Route::get('/student/setting', [StudentController::class, 'setting']);

// Student login route
Route::post('/student/login', [StudentController::class, 'studentLogin'])->name('student.login');
