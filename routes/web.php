<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'profileupdate'])->name('profileupdate');
Route::post('/profile/password/update', [ProfileController::class, 'passwordupdate'])->name('passwordupdate');
Route::post('/profile/profile/photo', [ProfileController::class, 'profilePhoto'])->name('profile.profilephoto');
