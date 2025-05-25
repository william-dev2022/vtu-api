<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\AdminPlanController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminTransactionController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Api\V1\PaymentController;

// Route::get('/', [AdminMainController::class, 'index'])->name('admin.index');
// Route::get('/pending-deposit', [AdminTransactionController::class, 'pending_deposit']);
// Route::delete('/transaction/deposit/{id}', [AdminTransactionController::class, 'delete_deposit']);
// Route::post('/update-transaction-status', [AdminTransactionController::class, 'update_status']);


// Route::resource('/transactions', AdminTransactionController::class);
// Route::resource('/plans', AdminPlanController::class);
// Route::resource('/users', AdminUserController::class);
// Route::resource('/services', AdminServiceController::class);
// Route::post('/update-service-status', [AdminServiceController::class, 'update_status']);


Route::get('login', [AdminAuthController::class, 'login_view'])->name('login.view');
Route::post('login', [AdminAuthController::class, 'login'])->name('login');


Route::post('/paystack/webhook', [PaymentController::class, 'handleWebhook'])
    ->name('paystack.webhook');
// ->middleware('paystack.webhook');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [AdminMainController::class, 'index'])->name('admin.index');
    Route::get('/pending-deposit', [AdminTransactionController::class, 'pending_deposit']);
    Route::delete('/transaction/deposit/{id}', [AdminTransactionController::class, 'delete_deposit']);
    Route::post('/update-transaction-status', [AdminTransactionController::class, 'update_status']);


    Route::resource('/transactions', AdminTransactionController::class);
    Route::resource('/plans', AdminPlanController::class);
    Route::resource('/users', AdminUserController::class);
    Route::resource('/services', AdminServiceController::class);
    Route::post('/update-service-status', [AdminServiceController::class, 'update_status']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});
