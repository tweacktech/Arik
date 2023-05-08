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
use App\Http\Controllers\APIHomePageController;
use App\Http\Controllers\APICommercialController;
use App\Http\Controllers\APICategoryController;
use App\Http\Controllers\APIFooterController;





Route::post('/homepage', [APIHomePageController::class, 'homepage'])->name('homepage');

Route::post('/menu', [APIWebMenuController::class, 'menu'])->name('menu');
Route::post('/menus', [APIWebMenuController::class, 'menus'])->name('menus');
Route::post('/submenu', [APIWebMenuController::class, 'submenu'])->name('submenu');

Route::post('/aboutus', [APIWebController::class, 'aboutus'])->name('aboutus');
Route::post('/terms', [APIWebController::class, 'terms'])->name('terms');
Route::post('/policy', [APIWebController::class, 'policy'])->name('policy');
Route::post('/web-content', [APIWebController::class, 'web_content'])->name('web_content');
Route::post('/slider', [APIWebController::class, 'slider'])->name('slider');
Route::post('/web', [APIWebController::class, 'web'])->name('web');


Route::post('/newsletter', [APINewsletterController::class, 'newsletter'])->name('newsletter');
Route::get('/newsletter/{id}', [APINewsletterController::class, 'showNewsLetter'])->name('showNewsLetter');

Route::post('/promo', [APIPromoController::class, 'Promo'])->name('Promo');
Route::get('/promo/{id}', [APIPromoController::class, 'showPromo'])->name('showPromo');

Route::post('/feature', [APIFeatureController::class, 'Feature'])->name('Feature');
Route::get('/feature/{id}', [APIFeatureController::class, 'showFeature'])->name('showFeature');

Route::post('/social', [APISocialController::class, 'Social'])->name('Social');
Route::get('/social/{id}', [APISocialController::class, 'showSocial'])->name('showSocial');

Route::post('/newsevent', [APINewsEventController::class, 'NewsEvent'])->name('NewsEvent');
Route::get('/newsevent/{id}', [APINewsEventController::class, 'showNewsEvent'])->name('showNewsEvent');

Route::post('/dealsoffer', [APIDealsOfferController::class, 'DealsOffer'])->name('DealsOffer');
Route::get('/dealsoffer/{id}', [APIDealsOfferController::class, 'showDealsOffer'])->name('showDealsOffer');

Route::post('/destination', [APIDestinationController::class, 'Destination'])->name('Destination');
Route::get('/destination/{id}', [APIDestinationController::class, 'showDestination'])->name('showDestination');


Route::post('/commercial', [APICommercialController::class, 'Commercial'])->name('Commercial');
Route::get('/commercial/{id}', [APICommercialController::class, 'showCommercial'])->name('showCommercial');


Route::post('/category', [APICategoryController::class, 'category'])->name('category');
Route::post('/subcategory', [APICategoryController::class, 'subcategory'])->name('subcategory');


Route::post('/footer', [APIFooterController::class, 'footer'])->name('footer');