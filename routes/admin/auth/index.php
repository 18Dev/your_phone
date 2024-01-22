<?php

use Illuminate\Support\Facades\Route;

Route::view('admin/sign-in', 'admin.pages.auth.sign-in')->name('admin.sign-in');
Route::post('login', [App\Modules\Auth\Http\Controllers\AuthController::class, 'loginAdmin'])->name('admin.login');


