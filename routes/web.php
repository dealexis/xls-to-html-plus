<?php

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
