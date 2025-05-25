<?php

use App\Http\Controllers\Api\V1\GeneralController;
use App\Http\Controllers\Api\V1\TestController;
use App\Http\Controllers\Api\V1\UserAccountController;
use App\Http\Controllers\Api\V1\UserAuthenticationController;
use App\Http\Controllers\Api\V1\UserTransactionController;
use App\Http\Controllers\Api\V1\PaymentController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return new UserResource($request->user());
})->middleware('auth:sanctum');


Route::post('/register', [UserAuthenticationController::class, 'register']);
Route::post('/login', [UserAuthenticationController::class, 'login']);

Route::get('/plans', [TestController::class, 'get_plans']);

Route::post('/logout', [UserAuthenticationController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/password/reset', [UserAuthenticationController::class, 'resetPassword'])->middleware('auth:sanctum');


Route::get('/data-plans', [GeneralController::class, 'data_plans']);
Route::get('/cable-plans', [GeneralController::class, 'cable_plans']);
Route::get('/exam-plans', [GeneralController::class, 'exam_plans']);

Route::get('/services', [GeneralController::class, 'services']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/send-verification-code', [UserAuthenticationController::class, 'sendVerificationCode'])->middleware('throttle:5,1');
    Route::post('/check-verification-code', [UserAuthenticationController::class, 'checkVerificationCode'])->middleware('throttle:5,1');;

    Route::get('/account/balance', [UserAccountController::class, 'balance']);
    Route::post('/buy-data', [UserTransactionController::class, 'buy_data'])->middleware('throttle:10,1');
    Route::post('/buy-airtime', [UserTransactionController::class, 'buy_airtime'])->middleware('throttle:2,1');

    Route::get('/account/transactions', [UserAccountController::class, 'transaction_history']);


    Route::get('/app/initalize', [GeneralController::class, 'init']);
    Route::post('/account/set-pin', [UserAccountController::class, 'set_pin']);
    Route::post('/payment/verify', [PaymentController::class, 'verify_payment']);
    Route::post('/payment/manual-payment', [PaymentController::class, 'manual_payment']);
});
