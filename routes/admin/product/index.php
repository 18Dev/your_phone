<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Product\Http\Controllers\ProductController;

Route::prefix('product')->name('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::view('/create', ProductController::pathView.'create')->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('store');
    Route::get('/{product}/show', [ProductController::class, 'show'])->name('show');
    Route::post('/{product}/update', [ProductController::class, 'update'])->name('update');
    Route::delete('/{product}/delete', [ProductController::class, 'delete'])->name('delete');
});
