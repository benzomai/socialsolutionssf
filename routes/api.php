<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UsersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Auth::routes();

//Admin Role

    Route::post('/admin/home', [ClientController::class, 'store'])->name('admin.store');

    Route::post('/admin/users', [UsersController::class, 'store'])->name('users.store');

