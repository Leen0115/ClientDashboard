<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Middleware\SetLocale;
Route::prefix('client')->middleware([SetLocale::class])->group(function () {
Route::get('/', function () {
    return view('welcome');
});
Route::get('/analytics', function () {
    return view('clientweb.dashboard');
});});

Route::get('/set-language/{lang}', [LanguageController::class, 'setLanguage'])->name('change.language');