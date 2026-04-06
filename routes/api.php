<?php

use App\Http\Controllers\Api\V1\AccountTypeController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BranchController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\LocationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes — V1
|--------------------------------------------------------------------------
|
| Registration flow:
|   1. GET  account-types        — Choose account type
|   2. GET  locations/*           — Location dropdowns
|   3. POST auth/send-otp        — Send OTP to email or phone (static: 123456)
|   4. POST auth/register         — Submit info + OTP codes → token
|
*/

Route::prefix('v1')->group(function () {

    // Screen 1: Account type selection
    Route::get('account-types', [AccountTypeController::class, 'index']);

    // Screen 2: Location dropdowns for registration form
    Route::prefix('locations')->group(function () {
        Route::get('countries', [LocationController::class, 'countries']);
        Route::get('countries/{country}/states', [LocationController::class, 'states']);
        Route::get('states/{state}/cities', [LocationController::class, 'cities']);
    });

    // Home — works with or without token (guest gets banners+stats, auth gets full dashboard)
    Route::get('home', [HomeController::class, 'index']);

    // Authentication — OTP + registration
    Route::prefix('auth')->group(function () {
        Route::post('send-otp', [AuthController::class, 'sendOtp']);
        Route::post('register', [AuthController::class, 'register']);
    });

    // Authenticated routes — requires Sanctum token
    Route::middleware('auth:sanctum')->group(function () {

        // Branch management (CRUD + search via ?search= query param)
        Route::apiResource('branches', BranchController::class);
    });
});
