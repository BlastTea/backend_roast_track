<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('v1/sign-up', [AuthController::class, 'signUp']);
Route::post('v1/sign-in', [AuthController::class, 'signIn']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('v1/user', function (Request $request) {
        return $request->user();
    });
    Route::post('v1/sign-out', [AuthController::class, 'signOut']);

    Route::get('v1/orders', [OrderController::class, 'getOrders']);

    Route::get('v1/companies', [CompanyController::class, 'getCompanies']);

    Route::middleware('ensure_admin')->group(function () {
        Route::post('v1/orders', [OrderController::class, 'addOrder']);
        Route::put('v1/orders', [OrderController::class, 'updateOrder']);
        Route::delete('v1/orders', [OrderController::class, 'deleteOrder']);
    });
});
