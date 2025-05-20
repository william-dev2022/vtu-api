<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\AdminPlanController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', [AdminMainController::class, 'index'])->name('admin.index');
Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('admin.index');
Route::resource('/plans', AdminPlanController::class);
Route::resource('/users', AdminUserController::class);
Route::resource('/services', AdminServiceController::class);
