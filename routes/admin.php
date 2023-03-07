<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::group(['prefix' => 'admin'], function () {
    Route::get('/usuarios', [App\Http\Controllers\Admin\HomeController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/productosAdmi', [App\Http\Controllers\Admin\HomeController::class, 'productosAdmi'])->name('admin.productosAdmi');
    Route::get('/categorias', [App\Http\Controllers\Admin\HomeController::class, 'categorias'])->name('admin.categorias');
    Route::get('/productosUser', [App\Http\Controllers\Admin\HomeController::class, 'productosUser'])->name('admin.productosUser');
    Route::get('/carrito', [App\Http\Controllers\Admin\HomeController::class, 'carrito'])->name('admin.carrito');
});