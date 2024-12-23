<?php

use App\Http\Controllers\Web\AccountController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.main');
})->name('page.main');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('page.privacy');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('page.terms');

Route::get('/api', function () {
    return view('pages.api');
})->name('page.api');

Route::get('/sign-up', function () {
    return view('pages.sign-up');
})->name('page.sign-up');

Route::get('/login', function () {
    return view('pages.login');
})->name('page.login');

Route::get('/account', [AccountController::class, 'page'])->name('page.account');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('page.logout')
    ->middleware('auth:sanctum');

Route::prefix('/auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    #Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
});
