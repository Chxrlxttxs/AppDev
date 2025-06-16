<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LogoutController;
use App\Http\Middleware\AuthCheck;

// Redirect base URL to login
Route::get('/', function () {
    return redirect('/login');
});

// ========== AUTH ROUTES ==========
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('auth.userRegister');

// ========== PROTECTED ROUTES ==========
Route::middleware([AuthCheck::class])->group(function () {

    // STUDENT CRUD
    Route::get('/students', [StudentsController::class, 'myView'])->name('std.myView');
    Route::post('/add-new', [StudentsController::class, 'addNewStudent'])->name('std.addNewStudent');
    Route::get('/student/update/{id}', [StudentsController::class, 'updateView'])->name('std.updateView');
    Route::post('/update', [StudentsController::class, 'updateME'])->name('std.studentUpdate');
    Route::get('/delete/{id}', [StudentsController::class, 'deleteME'])->name('std.studentDelete');

    // LOGOUT
    Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');

    // ========== OPTIONAL FEATURES ==========
    // Route::get('/search', [StudentsController::class, 'search'])->name('std.search');
    // Route::get('/filter', [StudentsController::class, 'filter'])->name('std.filter');
    // Route::get('/sort', [StudentsController::class, 'sort'])->name('std.sort');
    // Route::get('/pagination', [StudentsController::class, 'pagination'])->name('std.pagination');
});
