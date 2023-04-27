<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\APIWebController;
use App\Http\Controllers\APINewsletterController;
use App\Http\Controllers\APIPromoController;
use App\Http\Controllers\APINewsEventController;
use App\Http\Controllers\APIWebMenuController;
use App\Http\Controllers\APIFeatureController;
use App\Http\Controllers\APISocialController;
use App\Http\Controllers\APIDestinationController;
use App\Http\Controllers\APIDealsOfferController;





Route::get('/manage-users', [UserController::class, 'manage_users'])->name('manage_user_account');
Route::get('/manage-web', [APIWebController::class, 'manage_web'])->name('manage_web');

Route::get('/menu', [APIWebMenuController::class, 'menus'])->name('menus');

Route::get('/aboutus', [APIWebController::class, 'aboutus'])->name('aboutus');
Route::get('/terms', [APIWebController::class, 'terms'])->name('terms');
Route::get('/policy', [APIWebController::class, 'policy'])->name('policy');
Route::get('/web-content', [APIWebController::class, 'web_content'])->name('web_content');
Route::get('/slider', [APIWebController::class, 'slider'])->name('slider');
Route::get('/slider2', [APIWebController::class, 'slider2'])->name('slider2');


Route::get('/newsletter', [APINewsletterController::class, 'newsletter'])->name('newsletter');
Route::get('/newsletter/{id}', [APINewsletterController::class, 'showNewsLetter'])->name('showNewsLetter');

Route::get('/promo', [APIPromoController::class, 'Promo'])->name('Promo');
Route::get('/promo/{id}', [APIPromoController::class, 'showPromo'])->name('showPromo');

Route::get('/feature', [APIFeatureController::class, 'Feature'])->name('Feature');
Route::get('/feature/{id}', [APIFeatureController::class, 'showFeature'])->name('showFeature');

Route::get('/Social', [APISocialController::class, 'Social'])->name('Social');
Route::get('/Social/{id}', [APISocialController::class, 'showSocial'])->name('showSocial');

Route::get('/newsevent', [APINewsEventController::class, 'NewsEvent'])->name('NewsEvent');
Route::get('/newsevent/{id}', [APINewsEventController::class, 'showNewsEvent'])->name('showNewsEvent');

Route::get('/DealsOffer', [APIDealsOfferController::class, 'DealsOffer'])->name('DealsOffer');
Route::get('/DealsOffer/{id}', [APIDealsOfferController::class, 'showDealsOffer'])->name('showDealsOffer');

Route::get('/Destination', [APIDestinationController::class, 'Destination'])->name('Destination');
Route::get('/Destination/{id}', [APIDestinationController::class, 'showDestination'])->name('showDestination');


