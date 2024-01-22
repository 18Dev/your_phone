<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:admin')->group(function () {
    Route::view('admin', 'admin.index')->name('admin.index');

    /**
     * NAME: brand.index | brand.create | brand.store | brand.show | brand.update | brand.delete
     */
    includeFilesInFolder(__DIR__.'/admin/brand/');

    /**
     * NAME: admin.logout
     */
    Route::get('logout', function () {
        Auth::guard(ADMIN)->logout();
        return to_route('admin.sign-in');
    })->name('admin.logout');
});

Route::middleware('guest:admin')->group(function () {
    /**
     * NAME: admin.sign-in | admin.login
     */
    includeFilesInFolder(__DIR__ . '/admin/auth/');
});

/*
 * Fallback Route
 */
//Route::fallback(function () {
//    return redirect()->route(homeRoute())->withFlashDanger(__('Đường dẫn không tồn tại trong hệ thống.'));
//});
