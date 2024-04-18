<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SmmController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Role
Route::middleware(['auth','user_type:admin'])->group(function() {
    //Admin Dashboard
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('home.admin');
    Route::post('/admin/home', [ClientController::class, 'store'])->name('admin.store');

    //Users View
    Route::get('/admin/users', [UsersController::class, 'usersList'])->name('users.admin');
    Route::post('/admin/users', [UsersController::class, 'store'])->name('users.store');
    Route::post('/admin/users', [UsersController::class, 'destroy'])->name('users.destroy');

    //SMM View
    Route::get('/admin/smm', [SmmController::class, 'smmList'])->name('smm.admin');
});

//SMM Role
Route::middleware(['auth','user_type:smm'])->group(function() {
    Route::get('/smm/home', [HomeController::class, 'smmHome'])->name('home.smm');
});

//Client Role
Route::middleware(['auth','user_type:client'])->group(function() {
    Route::get('/home', [HomeController::class, 'userHome'])->name('home');
});




