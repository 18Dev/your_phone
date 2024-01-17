<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::view('admin', 'admin.index')->name('admin.index');

/**
 * NAME: brand.index | brand.create | brand.store | brand.show | brand.update | brand.delete
 */
includeFilesInFolder(__DIR__.'/admin/brand/');

/*
 * Fallback Route
 */
//Route::fallback(function () {
//    return redirect()->route(homeRoute())->withFlashDanger(__('Đường dẫn không tồn tại trong hệ thống.'));
//});
