<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Brand\Http\Controllers\BrandController;

Route::prefix('brand')->name('brand.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::view('/create', BrandController::pathView.'create')->name('create');
    Route::post('/create', [BrandController::class, 'store'])->name('store');
    Route::get('/{brand}/show', [BrandController::class, 'show'])->name('show');
    Route::post('/{brand}/update', [BrandController::class, 'update'])->name('update');
    Route::delete('/{brand}/delete', [BrandController::class, 'delete'])->name('delete');
});

