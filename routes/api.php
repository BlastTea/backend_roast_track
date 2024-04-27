<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ClassificationController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\ProfileController;
use App\Http\Controllers\api\RoasteryController;
use App\Http\Controllers\api\RoastingController;
use App\Http\Controllers\api\SalesStatisticsController;
use App\Models\Company;
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
        return $request->user()->load('company');
    });

    Route::post('v1/sign-out', [AuthController::class, 'signOut']);
    Route::post('v1/update-profile', [ProfileController::class, 'updateProfile']);
    Route::post('v1/update-password', [ProfileController::class, 'updatePassword']);

    Route::get('v1/orders', [OrderController::class, 'getOrders']);

    Route::middleware('ensure_admin')->group(function () {
        Route::post('v1/orders', [OrderController::class, 'addOrder']);
        Route::put('v1/orders', [OrderController::class, 'updateOrder']);
        Route::delete('v1/orders', [OrderController::class, 'deleteOrder']);

        Route::get('v1/roasteries', [RoasteryController::class, 'getRoasteries']);
        Route::post('v1/roasteries', [RoasteryController::class, 'addRoastery']);
        Route::put('v1/roasteries', [RoasteryController::class, 'updateRoastery']);
        Route::delete('v1/roasteries', [RoasteryController::class, 'deleteRoastery']);

        Route::get('v1/sales-statistics', [SalesStatisticsController::class, 'getSalesStatistics']);
    });

    Route::middleware('ensure_roastery')->group(function () {
        Route::post('v1/roastings', [RoastingController::class, 'addRoasting']);

        Route::post('v1/roasting-classifications', [ClassificationController::class, 'addRoastingClassification']);

        Route::get('v1/classifications', [ClassificationController::class, 'getClassification']);
        Route::post('v1/classifications', [ClassificationController::class, 'addClassification']);
    });
});
