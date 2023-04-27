<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\WebMenuController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DealsOfferController;
use Illuminate\Http\Request;

Route::get('/home', function () {
  return view('welcome');
});

Route::get('/', function () {
  return view('auth.login');
});

Auth::routes();

//on and off site
Route::get('/onsite', function () {
  $on = DB::table('manage_site')
    ->update(['value' => 1]);

  return redirect()->back();
})->name('onsite');

Route::get('/offsite', function () {
  $on = DB::table('manage_site')
    ->update(['value' => 0]);

  return redirect()->back();
})->name('offsite');

//set dollar 
// Route::post('/set-dollar', [StoreController::class, 'set_dollar_rate'])->name('set_dollar_rate');

//set delevery rate 
Route::post('/set-delivery-rate-per-kilometer', function (Request $req) {
  DB::table('delivery_rate_per_km')
    ->update(['rate' => $req->rate]);

  return redirect()->back();
})->name('set_delivery_rate');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Otp
Route::get('/verify-otp', [App\Http\Controllers\OtpController::class, 'indexotp'])->name('verify-otp');
Route::get('/verify-otp/{otp}', [App\Http\Controllers\OtpController::class, 'indexotpurl'])->name('verify-otp-url');
Route::post('/checkOtp', [App\Http\Controllers\OtpController::class, 'postVerifyOTP'])->name('checkOtp');


// User Account
Route::get('/manage-users', [UserController::class, 'manage_users'])->name('manage_user_account');
Route::post('/register-users', [UserController::class, 'register_user'])->name('register_user');
Route::get('/suspend-user/{id}', [UserController::class, 'suspend_user'])->name('suspend_user');
Route::get('/unsuspend-user/{id}', [UserController::class, 'unsuspend_user'])->name('unsuspend_user');
Route::get('/delete-user/{id}', [UserController::class, 'delete_user'])->name('delete_user');
Route::get('/edit-user/{id}', [UserController::class, 'edit_user_page'])->name('edit_user_page');
Route::put('/edit-user', [UserController::class, 'edit_user'])->name('edit_user');
Route::get('/user-role/{id}', [UserController::class, 'user_role'])->name('user_role');
Route::get('/add-user-menu/{id}', [UserController::class, 'add_user_menu'])->name('add_user_menu');
Route::get('/remove-user-menu/{id}', [UserController::class, 'remove_user_menu'])->name('remove_user_menu');
Route::get('/reset-password', [UserController::class, 'reset_password'])->name('reset-password');



Route::put('/update-web-content', [WebController::class, 'update_web_content'])->name('update_web_content');
Route::put('/update-web-offer', [WebController::class, 'update_web_offer'])->name('update_web_offer');

Route::post('/update_website', [WebController::class, 'update_website'])->name('update_website');
Route::post('/update_faq', [WebController::class, 'update_faq'])->name('update_faq');


Route::post('/update_category_slider', [WebController::class, 'update_category_slider'])->name('update_category_slider');

Route::get('/manage-web', [WebController::class, 'manage_web'])->name('manage_web');
Route::get('/manage_offer_slider', [WebController::class, 'manage_offer_slider'])->name('manage_offer_slider');
Route::put('/update-slider', [WebController::class, 'update_slider'])->name('update_slider');
Route::put('/update-slider2', [WebController::class, 'update_slider2'])->name('update_slider2');
Route::get('/web-content', [WebController::class, 'web_content'])->name('web_content');
// Route::get('/web-offer', [WebController::class, 'web_offer'])->name('web_offer');
Route::get('/manage-slider', [WebController::class, 'slider'])->name('slider');
Route::get('/manage-slider2', [WebController::class, 'slider2'])->name('slider2');
Route::get('/manage-website', [WebController::class, 'website'])->name('website');
Route::get('/manage-logo', [WebController::class, 'logo'])->name('logo');
Route::put('/manage-logo', [WebController::class, 'weblogo'])->name('weblogo');
Route::get('/manage-faq', [WebController::class, 'faq'])->name('faq');


// manage newsletter
Route::get('/manage-newsletter', [NewsletterController::class, 'newsletter'])->name('newsletter');
Route::post('/add-newsletter', [NewsletterController::class, 'addnewsletter'])->name('addnewsletter');
Route::get('/hideNews/{id}', [NewsletterController::class, 'hideNews'])->name('hideNews');
Route::get('/unhideNews/{id}', [NewsletterController::class, 'unhideNews'])->name('unhideNews');
Route::get('/editnews/{id}', [NewsletterController::class, 'editnews'])->name('editnews');
Route::put('/updateNewsletter/{id}', [NewsletterController::class, 'updateNewsletter'])->name('updateNewsletter');
Route::get('/deleteNewsletter/{id}', [NewsletterController::class, 'deleteNewsletter'])->name('deleteNewsletter');


// manage promo
Route::get('/manage-Promo', [PromoController::class, 'Promo'])->name('Promo');
Route::post('/add-Promo', [PromoController::class, 'addPromo'])->name('addpromo');
Route::get('/hidePromo/{id}', [PromoController::class, 'hidePromo'])->name('hidePromo');
Route::get('/unhidePromo/{id}', [PromoController::class, 'unhidePromo'])->name('unhidePromo');
Route::get('/editPromo/{id}', [PromoController::class, 'editPromo'])->name('editPromo');
Route::put('/updatePromo/{id}', [PromoController::class, 'updatePromo'])->name('updatePromo');
Route::get('/deletePromo/{id}', [PromoController::class, 'deletePromo'])->name('deletePromo');




// News and Offer
Route::get('/manage-NewsEvent', [NewsEventController::class, 'NewsEvent'])->name('NewsEvent');
Route::post('/add-NewsEvent', [NewsEventController::class, 'addNewsEvent'])->name('addNewsEvent');
Route::get('/hideNewsEvent/{id}', [NewsEventController::class, 'hideNewsEvent'])->name('hideNewsEvent');
Route::get('/unhideNewsEvent/{id}', [NewsEventController::class, 'unhideNewsEvent'])->name('unhideNewsEvent');
Route::get('/editNewsEvent/{id}', [NewsEventController::class, 'editNewsEvent'])->name('editNewsEvent');
Route::put('/updateNewsEvent/{id}', [NewsEventController::class, 'updateNewsEvent'])->name('updateNewsEvent');
Route::get('/deleteNewsEvent/{id}', [NewsEventController::class, 'deleteNewsEvent'])->name('deleteNewsEvent');


// menu and submenu
Route::get('/Overall', [WebMenuController::class, 'index'])->name('Overall');
Route::get('/manage-WebMenu', [WebMenuController::class, 'WebMenu'])->name('WebMenu');
Route::post('/add-WebMenu', [WebMenuController::class, 'addWebMenu'])->name('addWebMenu');
Route::get('/hideWebMenu/{id}', [WebMenuController::class, 'hideWebMenu'])->name('hideWebMenu');
Route::get('/unhideWebMenu/{id}', [WebMenuController::class, 'unhideWebMenu'])->name('unhideWebMenu');
Route::get('/editWebMenu/{id}', [WebMenuController::class, 'editWebMenu'])->name('editWebMenu');
Route::put('/updateWebMenu/{id}', [WebMenuController::class, 'updateWebMenu'])->name('updateWebMenu');
Route::get('/deleteWebMenu/{id}', [WebMenuController::class, 'deleteWebMenu'])->name('deleteWebMenu');
// subMenus
Route::get('/manage-SubMenu', [SubMenuController::class, 'SubMenu'])->name('SubMenu');
Route::post('/add-SubMenu', [SubMenuController::class, 'addSubMenu'])->name('addSubMenu');
Route::get('/hideSubMenu/{id}', [SubMenuController::class, 'hideSubMenu'])->name('hideSubMenu');
Route::get('/unhideSubMenu/{id}', [SubMenuController::class, 'unhideSubMenu'])->name('unhideSubMenu');
Route::get('/editSubMenu/{id}', [SubMenuController::class, 'editSubMenu'])->name('editSubMenu');
Route::put('/updateSubMenu/{id}', [SubMenuController::class, 'updateSubMenu'])->name('updateSubMenu');
Route::get('/deleteSubMenu/{id}', [SubMenuController::class, 'deleteSubMenu'])->name('deleteSubMenu');



// manage Feature
Route::get('/manage-Feature', [FeatureController::class, 'Feature'])->name('Feature');
Route::post('/add-Feature', [FeatureController::class, 'addFeature'])->name('addFeature');
Route::get('/hideFeature/{id}', [FeatureController::class, 'hideFeature'])->name('hideFeature');
Route::get('/unhideFeature/{id}', [FeatureController::class, 'unhideFeature'])->name('unhideFeature');
Route::get('/editFeature/{id}', [FeatureController::class, 'editFeature'])->name('editFeature');
Route::put('/updateFeature/{id}', [FeatureController::class, 'updateFeature'])->name('updateFeature');
Route::get('/deleteFeature/{id}', [FeatureController::class, 'deleteFeature'])->name('deleteFeature');




// manage social media
Route::get('/manage-Social', [SocialController::class, 'Social'])->name('Social');
Route::post('/add-Social', [SocialController::class, 'addSocial'])->name('addSocial');
Route::get('/hideSocial/{id}', [SocialController::class, 'hideSocial'])->name('hideSocial');
Route::get('/unhideSocial/{id}', [SocialController::class, 'unhideSocial'])->name('unhideSocial');
Route::get('/editSocial/{id}', [SocialController::class, 'editSocial'])->name('editSocial');
Route::put('/updateSocial/{id}', [SocialController::class, 'updateSocial'])->name('updateSocial');
Route::get('/deleteSocial/{id}', [SocialController::class, 'deleteSocial'])->name('deleteSocial');

// manage popurlar Destination
Route::get('/manage-Destination', [DestinationController::class, 'Destination'])->name('Destination');
Route::post('/add-Destination', [DestinationController::class, 'addDestination'])->name('addDestination');
Route::get('/hideDestination/{id}', [DestinationController::class, 'hideDestination'])->name('hideDestination');
Route::get('/unhideDestination/{id}', [DestinationController::class, 'unhideDestination'])->name('unhideDestination');
Route::get('/editDestination/{id}', [DestinationController::class, 'editDestination'])->name('editDestination');
Route::put('/updateDestination/{id}', [DestinationController::class, 'updateDestination'])->name('updateDestination');
Route::get('/deleteDestination/{id}', [DestinationController::class, 'deleteDestination'])->name('deleteDestination');


// manage popurlar DealsOffer
Route::get('/manage-DealsOffer', [DealsOfferController::class, 'DealsOffer'])->name('DealsOffer');
Route::post('/add-DealsOffer', [DealsOfferController::class, 'addDealsOffer'])->name('addDealsOffer');
Route::get('/hideDealsOffer/{id}', [DealsOfferController::class, 'hideDealsOffer'])->name('hideDealsOffer');
Route::get('/unhideDealsOffer/{id}', [DealsOfferController::class, 'unhideDealsOffer'])->name('unhideDealsOffer');
Route::get('/editDealsOffer/{id}', [DealsOfferController::class, 'editDealsOffer'])->name('editDealsOffer');
Route::put('/updateDealsOffer/{id}', [DealsOfferController::class, 'updateDealsOffer'])->name('updateDealsOffer');
Route::get('/deleteDealsOffer/{id}', [DealsOfferController::class, 'deleteDealsOffer'])->name('deleteDealsOffer');
