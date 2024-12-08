<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\User\UserXlsConversionController;
use App\Http\Controllers\Api\XlsConversionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/user/convert-xls', [UserXlsConversionController::class, 'convertXls'])->name('user.convert-xls');
    Route::get('/user/conversions', [UserXlsConversionController::class, 'index'])->name('user.conversions');
});

Route::post('convert-xls', [XlsConversionController::class, 'convertXls'])->name('convert-xls');
