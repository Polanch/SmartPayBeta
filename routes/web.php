<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;    
Route::get('/', function () {
    return view('welcome');
});





Route::middleware(['student'])->group(function () {
    Route::get('/student/home', [StudentController::class, 'home']);
    Route::get('/student/transaction', [StudentController::class, 'transaction']);
    Route::get('/student/setting', [StudentController::class, 'setting']);
    Route::post('/student/setting/update', [StudentController::class, 'update']);
    Route::get('/student/credit', [StudentController::class, 'credit']);
    Route::post('/payment/credit', [PaymentController::class, 'creditAdd'])->name('payment.credit');
    Route::post('/payment/gcash', [PaymentController::class, 'gcashPay'])->name('payment.gcash');
});

Route::post('/webhook/paymongo', [PaymentController::class, 'handlePaymongoWebhook']);

// Student login route
Route::post('/student/login', [StudentController::class, 'studentLogin'])->name('student.login');


// AJAX route to toggle lock status
Route::post('/student/toggle-lock', [StudentController::class, 'toggleLock'])->name('student.toggleLock');

// Student logout route
Route::get('/student/logout', [StudentController::class, 'logout'])->name('student.logout');
                    
