<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/', [UrlController::class, 'store'])->name('shorten');

Route::get('/{short_url}', [UrlController::class, 'redirect'])->name('url.redirect');

Route::get('about', function () {
    return view('about');
})->name('about');
