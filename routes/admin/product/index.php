<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Brand\Http\Controllers\BrandController;

Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [BrandController::class, 'index'])->name('index');
    Route::view('/create', BrandController::pathView.'create')->name('create');
    Route::post('/create', [BrandController::class, 'store'])->name('store');
    Route::get('/{product}/show', [BrandController::class, 'show'])->name('show');
    Route::post('/{product}/update', [BrandController::class, 'update'])->name('update');
    Route::delete('/{product}/delete', [BrandController::class, 'delete'])->name('delete');
});
