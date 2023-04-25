<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\APIWebController;
use App\Http\Controllers\APINewsletterController;
use App\Http\Controllers\APIPromoController;
use App\Http\Controllers\APINewsEventController;



Route::get('/manage-users', [UserController::class, 'manage_users'])->name('manage_user_account');
Route::get('/manage-web', [APIWebController::class, 'manage_web'])->name('manage_web');

Route::get('/aboutus', [APIWebController::class, 'aboutus'])->name('aboutus');
Route::get('/terms', [APIWebController::class, 'terms'])->name('terms');
Route::get('/policy', [APIWebController::class, 'policy'])->name('policy');
Route::get('/web-content', [APIWebController::class, 'web_content'])->name('web_content');
Route::get('/slider', [APIWebController::class, 'slider'])->name('slider');
Route::get('/slider2', [APIWebController::class, 'slider2'])->name('slider2');

Route::get('/manage-newsletter', [APINewsletterController::class, 'newsletter'])->name('newsletter');
Route::get('/showNewsLetter/{id}', [APINewsletterController::class, 'showNewsLetter'])->name('showNewsLetter');

Route::get('/manage-Promo', [APIPromoController::class, 'Promo'])->name('Promo');
Route::get('/manage-Promo/{id}', [APIPromoController::class, 'showPromo'])->name('showPromo');

Route::get('/manage-NewsEvent', [APINewsEventController::class, 'NewsEvent'])->name('NewsEvent');
Route::get('/showNewsEvent/{id}', [APINewsEventController::class, 'showNewsEvent'])->name('showNewsEvent');