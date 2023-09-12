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
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\QuickBoxController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\MissionVissionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CompanyHistoryController;
use App\Http\Controllers\AppStoreController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\EventCatController;
use App\Http\Controllers\DealCatController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\CafeCatController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CareRentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BaggageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CabinController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\TouristCatController;
use App\Http\Controllers\TravelExtraController;
use App\Http\Controllers\SpecialController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\SeatCatController;
use App\Http\Controllers\ParkingSpotController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SpecialOffersController;
use App\Http\Controllers\CafeHeaderController;
use App\Http\Controllers\SeatHeaderController;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\HotelSliderController;
use App\Http\Controllers\TouristHeaderController;
use App\Http\Controllers\ParkHeaderController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TermHeaderController;
use App\Http\Controllers\ContactDetailController;
use App\Http\Controllers\BaggageTableController;
use App\Http\Controllers\DealHeaderController;
use App\Http\Controllers\CareHeaderController;
use App\Http\Controllers\CourseCatController;
use App\Http\Controllers\DealOfferCatController;
use App\Http\Controllers\WebBonusController;
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


Route::get('/api', function () {
  $routes = Route::getRoutes()->getRoutesByMethod();
  return view('APIs', ['routes' => $routes]);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Service', [App\Http\Controllers\HomeController::class, 'Service'])->name('Service');
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


Route::get('/profile', [UserController::class, 'show'])->name('profile');
Route::post('/profile/change-password', [UserController::class, 'changePassword'])->name('profile.changePassword');



Route::put('/update-web-content', [WebController::class, 'update_web_content'])->name('update_web_content');
Route::put('/update-web-offer', [WebController::class, 'update_web_offer'])->name('update_web_offer');

Route::post('/update_website', [WebController::class, 'update_website'])->name('update_website');
Route::post('/update_faq', [WebController::class, 'update_faq'])->name('update_faq');


Route::post('/update_category_slider', [WebController::class, 'update_category_slider'])->name('update_category_slider');

Route::get('/manage-web', [WebController::class, 'manage_web'])->name('manage_web');
Route::get('/manage_offer_slider', [WebController::class, 'manage_offer_slider'])->name('manage_offer_slider');
Route::put('/update-slider', [WebController::class, 'update_slider'])->name('update_slider');
Route::get('/web-content', [WebController::class, 'web_content'])->name('web_content');
// Route::get('/web-offer', [WebController::class, 'web_offer'])->name('web_offer');
Route::get('/manage-slider', [WebController::class, 'slider'])->name('slider');
Route::get('/manage-slider2', [WebController::class, 'slider2'])->name('slider2');
Route::get('/manage-website', [WebController::class, 'website'])->name('website');
Route::get('/manage-logo', [WebController::class, 'logo'])->name('logo');
Route::put('/manage-logo', [WebController::class, 'weblogo'])->name('weblogo');
Route::get('/manage-faq', [WebController::class, 'faq'])->name('faq');


// manage newsletter
Route::get('/manage-Newsletter/{id}', [NewsletterController::class, 'newsletter'])->name('newsletter');
Route::post('/add-newsletter', [NewsletterController::class, 'addnewsletter'])->name('addnewsletter');
Route::get('/hideNews/{id}', [NewsletterController::class, 'hideNews'])->name('hideNews');
Route::get('/unhideNews/{id}', [NewsletterController::class, 'unhideNews'])->name('unhideNews');
Route::get('/editnews/{id}', [NewsletterController::class, 'editnews'])->name('editnews');
Route::put('/updateNewsletter/{id}', [NewsletterController::class, 'updateNewsletter'])->name('updateNewsletter');
Route::get('/deleteNewsletter/{id}', [NewsletterController::class, 'deleteNewsletter'])->name('deleteNewsletter');


// manage promo
Route::get('/manage-Promo/{id}', [PromoController::class, 'Promo'])->name('Promo');
Route::post('/add-Promo', [PromoController::class, 'addPromo'])->name('addpromo');
Route::get('/hidePromo/{id}', [PromoController::class, 'hidePromo'])->name('hidePromo');
Route::get('/unhidePromo/{id}', [PromoController::class, 'unhidePromo'])->name('unhidePromo');
Route::get('/editPromo/{id}', [PromoController::class, 'editPromo'])->name('editPromo');
Route::put('/updatePromo/{id}', [PromoController::class, 'updatePromo'])->name('updatePromo');
Route::get('/deletePromo/{id}', [PromoController::class, 'deletePromo'])->name('deletePromo');




// News and Offer
Route::get('/manage-NewsEvent/{id}', [NewsEventController::class, 'NewsEvent'])->name('NewsEvent');
Route::post('/add-NewsEvent', [NewsEventController::class, 'addNewsEvent'])->name('addNewsEvent');
Route::get('/hideNewsEvent/{id}', [NewsEventController::class, 'hideNewsEvent'])->name('hideNewsEvent');
Route::get('/unhideNewsEvent/{id}', [NewsEventController::class, 'unhideNewsEvent'])->name('unhideNewsEvent');
Route::get('/editNewsEvent/{id}', [NewsEventController::class, 'editNewsEvent'])->name('editNewsEvent');
Route::put('/updateNewsEvent/{id}', [NewsEventController::class, 'updateNewsEvent'])->name('updateNewsEvent');
Route::get('/deleteNewsEvent/{id}', [NewsEventController::class, 'deleteNewsEvent'])->name('deleteNewsEvent');
Route::get('/NewsEventLabel', [NewsEventController::class, 'NewsEventLabel'])->name('NewsEventLabel');
Route::put('/NewsEventLabel/{id}', [NewsEventController::class, 'NewsEventLabelstore'])->name('NewsEventLabelstore');



// menu and submenu
Route::get('/Overall', [WebMenuController::class, 'index'])->name('Overall');
Route::get('/manage-WebMenu', [WebMenuController::class, 'WebMenu'])->name('WebMenu');
Route::post('/add-WebMenu', [WebMenuController::class, 'addWebMenu'])->name('addWebMenu');
Route::get('/hideWebMenu/{id}', [WebMenuController::class, 'hideWebMenu'])->name('hideWebMenu');
Route::get('/unhideWebMenu/{id}', [WebMenuController::class, 'unhideWebMenu'])->name('unhideWebMenu');
Route::get('/editWebMenu/{id}', [WebMenuController::class, 'editWebMenu'])->name('editWebMenu');
Route::put('/updateWebMenu/{id}', [WebMenuController::class, 'updateWebMenu'])->name('updateWebMenu');
Route::get('/deleteWebMenu/{id}', [WebMenuController::class, 'deleteWebMenu'])->name('deleteWebMenu');
Route::post('Custom-sortable', [WebMenuController::class, 'updateO'])->name('updateO');
// subMenus
Route::get('/manage-SubMenu', [SubMenuController::class, 'SubMenu'])->name('SubMenu');
Route::post('/add-SubMenu', [SubMenuController::class, 'addSubMenu'])->name('addSubMenu');
Route::get('/hideSubMenu/{id}', [SubMenuController::class, 'hideSubMenu'])->name('hideSubMenu');
Route::get('/unhideSubMenu/{id}', [SubMenuController::class, 'unhideSubMenu'])->name('unhideSubMenu');
Route::get('/editSubMenu/{id}', [SubMenuController::class, 'editSubMenu'])->name('editSubMenu');
Route::put('/updateSubMenu/{id}', [SubMenuController::class, 'updateSubMenu'])->name('updateSubMenu');
Route::get('/deleteSubMenu/{id}', [SubMenuController::class, 'deleteSubMenu'])->name('deleteSubMenu');



// manage Feature
Route::get('/manage-Feature/{id}', [FeatureController::class, 'Feature'])->name('Feature');
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
Route::get('/manage-Destination/{id}', [DestinationController::class, 'Destination'])->name('Destination');
Route::post('/add-Destination', [DestinationController::class, 'addDestination'])->name('addDestination');
Route::get('/hideDestination/{id}', [DestinationController::class, 'hideDestination'])->name('hideDestination');
Route::get('/unhideDestination/{id}', [DestinationController::class, 'unhideDestination'])->name('unhideDestination');
Route::get('/editDestination/{id}', [DestinationController::class, 'editDestination'])->name('editDestination');
Route::put('/updateDestination/{id}', [DestinationController::class, 'updateDestination'])->name('updateDestination');
Route::get('/deleteDestination/{id}', [DestinationController::class, 'deleteDestination'])->name('deleteDestination');

Route::get('/DestinationLabel', [DestinationController::class, 'DestinationLabel'])->name('DestinationLabel');
Route::put('/DestinationLabel/{id}', [DestinationController::class, 'DestinationLabelstore'])->name('DestinationLabelstore');


// manage popurlar DealsOffer
Route::get('/manage-DealsOffer/{id}', [DealsOfferController::class, 'DealsOffer'])->name('DealsOffer');
Route::post('/add-DealsOffer', [DealsOfferController::class, 'addDealsOffer'])->name('addDealsOffer');
Route::get('/hideDealsOffer/{id}', [DealsOfferController::class, 'hideDealsOffer'])->name('hideDealsOffer');
Route::get('/unhideDealsOffer/{id}', [DealsOfferController::class, 'unhideDealsOffer'])->name('unhideDealsOffer');
Route::get('/editDealIcons/{id}', [DealsOfferController::class, 'editDealIcons'])->name('editDealIcons');
Route::get('/editDealsOffer/{id}', [DealsOfferController::class, 'editDealsOffer'])->name('editDealsOffer');
Route::put('/updateDealsOffer/{id}', [DealsOfferController::class, 'updateDealsOffer'])->name('updateDealsOffer');
Route::get('/deleteDealsOffer/{id}', [DealsOfferController::class, 'deleteDealsOffer'])->name('deleteDealsOffer');
Route::get('/deletedealsicon/{id}', [DealsOfferController::class, 'deletedealsicon'])->name('deletedealsicon');
Route::get('/DealLabel', [DealsOfferController::class, 'DealLabel'])->name('DealLabel');
Route::put('/storeOrUpdate/{id}', [DealsOfferController::class, 'storeOrUpdate'])->name('storeOrUpdate');

Route::post('/update_dealicons', [DealsOfferController::class, 'update_dealicons'])->name('update_dealicons');


// manage Commercial
Route::get('/manage-Commercial/{id}', [CommercialController::class, 'Commercial'])->name('Commercial');
Route::post('/add-Commercial', [CommercialController::class, 'addCommercial'])->name('addCommercial');
Route::get('/hideCommercial/{id}', [CommercialController::class, 'hideCommercial'])->name('hideCommercial');
Route::get('/unhideCommercial/{id}', [CommercialController::class, 'unhideCommercial'])->name('unhideCommercial');
Route::get('/editCommercial/{id}', [CommercialController::class, 'editCommercial'])->name('editCommercial');
Route::put('/updateCommercial/{id}', [CommercialController::class, 'updateCommercial'])->name('updateCommercial');
Route::get('/deleteCommercial/{id}', [CommercialController::class, 'deleteCommercial'])->name('deleteCommercial');




Route::get('/home-role/{id}', [HomePageController::class, 'home_role'])->name('home_role');
Route::get('/active-homepage/{id}', [App\Http\Controllers\HomePageController::class, 'switchStatus'])->name('switchStatus');

Route::get('/add-homepage/{id}', [HomePageController::class, 'add_homepage'])->name('add_homepage');
Route::get('/remove-hompage/{id}', [HomePageController::class, 'remove_homepage'])->name('remove_homepage');



// Category and Subm
Route::get('/manage-Category', [CategoryController::class, 'Category'])->name('Category');
Route::post('/add-Category', [CategoryController::class, 'addCategory'])->name('addCategory');
Route::get('/hideCategory/{id}', [CategoryController::class, 'hideCategory'])->name('hideCategory');
Route::get('/unhideCategory/{id}', [CategoryController::class, 'unhideCategory'])->name('unhideCategory');
Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::put('/updateCategory/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
Route::get('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
// subCat
Route::get('/manage-SubCategory', [SubCategoryController::class, 'SubCategory'])->name('SubCategory');
Route::post('/add-SubCategory', [SubCategoryController::class, 'addSubCategory'])->name('addSubCategory');
Route::get('/hideSubCategory/{id}', [SubCategoryController::class, 'hideSubCategory'])->name('hideSubCategory');
Route::get('/unhideSubCategory/{id}', [SubCategoryController::class, 'unhideSubCategory'])->name('unhideSubCategory');
Route::get('/editSubCategory/{id}', [SubCategoryController::class, 'editSubCategory'])->name('editSubCategory');
Route::put('/updateSubCategory/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('updateSubCategory');
Route::get('/deleteSubCategory/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('deleteSubCategory');


//Bonus this appears in homepage 1 and 3
Route::get('/manage-Bonus/{id}', [BonusController::class, 'Bonus'])->name('Bonus');
Route::post('/add-Bonus', [BonusController::class, 'addBonus'])->name('addBonus');
Route::get('/hideBonus/{id}', [BonusController::class, 'hideBonus'])->name('hideBonus');
Route::get('/unhideBonus/{id}', [BonusController::class, 'unhideBonus'])->name('unhideBonus');
Route::get('/editBonus/{id}', [BonusController::class, 'editBonus'])->name('editBonus');
Route::put('/updateBonus/{id}', [BonusController::class, 'updateBonus'])->name('updateBonus');
Route::get('/deleteBonus/{id}', [BonusController::class, 'deleteBonus'])->name('deleteBonus');

//footer Quick box
Route::get('/manage-QuickBox/{id}', [QuickBoxController::class, 'QuickBox'])->name('QuickBox');
Route::post('/add-QuickBox', [QuickBoxController::class, 'addQuickBox'])->name('addQuickBox');
Route::get('/hideQuickBox/{id}', [QuickBoxController::class, 'hideQuickBox'])->name('hideQuickBox');
Route::get('/unhideQuickBox/{id}', [QuickBoxController::class, 'unhideQuickBox'])->name('unhideQuickBox');
Route::get('/editQuickBox/{id}', [QuickBoxController::class, 'editQuickBox'])->name('editQuickBox');
Route::put('/updateQuickBox/{id}', [QuickBoxController::class, 'updateQuickBox'])->name('updateQuickBox');
Route::get('/deleteQuickBox/{id}', [QuickBoxController::class, 'deleteQuickBox'])->name('deleteQuickBox');


// manage  Footer
Route::get('/manage-Footer/{id}', [FooterController::class, 'Footer'])->name('Footer');
Route::post('/add-Footer', [FooterController::class, 'addFooter'])->name('addFooter');
Route::get('/hideFooter/{id}', [FooterController::class, 'hideFooter'])->name('hideFooter');
Route::get('/unhideFooter/{id}', [FooterController::class, 'unhideFooter'])->name('unhideFooter');
Route::get('/editFooter/{id}', [FooterController::class, 'editFooter'])->name('editFooter');
Route::put('/updateFooter/{id}', [FooterController::class, 'updateFooter'])->name('updateFooter');
Route::get('/deleteFooter/{id}', [FooterController::class, 'deleteFooter'])->name('deleteFooter');


// manage  About
Route::get('/manage-About', [AboutController::class, 'About'])->name('About');
Route::post('/add-About', [AboutController::class, 'addAbout'])->name('addAbout');
Route::get('/hideAbout/{id}', [AboutController::class, 'hideAbout'])->name('hideAbout');
Route::get('/unhideAbout/{id}', [AboutController::class, 'unhideAbout'])->name('unhideAbout');
Route::get('/editAbout/{id}', [AboutController::class, 'editAbout'])->name('editAbout');
Route::put('/updateAbout/{id}', [AboutController::class, 'updateAbout'])->name('updateAbout');
Route::get('/deleteAbout/{id}', [AboutController::class, 'deleteAbout'])->name('deleteAbout');

// manage  Policy
Route::get('/manage-Policy', [PolicyController::class, 'Policy'])->name('Policy');
Route::post('/add-Policy', [PolicyController::class, 'addPolicy'])->name('addPolicy');
Route::get('/hidePolicy/{id}', [PolicyController::class, 'hidePolicy'])->name('hidePolicy');
Route::get('/unhidePolicy/{id}', [PolicyController::class, 'unhidePolicy'])->name('unhidePolicy');
Route::get('/editPolicy/{id}', [PolicyController::class, 'editPolicy'])->name('editPolicy');
Route::put('/updatePolicy/{id}', [PolicyController::class, 'updatePolicy'])->name('updatePolicy');
Route::get('/deletePolicy/{id}', [PolicyController::class, 'deletePolicy'])->name('deletePolicy');


// manage  MissionVission
Route::get('/manage-MissionVission', [MissionVissionController::class, 'MissionVission'])->name('MissionVission');
Route::post('/add-MissionVission', [MissionVissionController::class, 'addMissionVission'])->name('addMissionVission');
Route::get('/hideMissionVission/{id}', [MissionVissionController::class, 'hideMissionVission'])->name('hideMissionVission');
Route::get('/unhideMissionVission/{id}', [MissionVissionController::class, 'unhideMissionVission'])->name('unhideMissionVission');
Route::get('/editMissionVission/{id}', [MissionVissionController::class, 'editMissionVission'])->name('editMissionVission');
Route::put('/updateMissionVission/{id}', [MissionVissionController::class, 'updateMissionVission'])->name('updateMissionVission');
Route::get('/deleteMissionVission/{id}', [MissionVissionController::class, 'deleteMissionVission'])->name('deleteMissionVission');

//FREQUENTLY ASKED QUESTIONS
Route::get('/manage-Faq', [FaqController::class, 'Faq'])->name('Faq');
Route::post('/add-Faq', [FaqController::class, 'addFaq'])->name('addFaq');
Route::get('/hideFaq/{id}', [FaqController::class, 'hideFaq'])->name('hideFaq');
Route::get('/unhideFaq/{id}', [FaqController::class, 'unhideFaq'])->name('unhideFaq');
Route::get('/editFaq/{id}', [FaqController::class, 'editFaq'])->name('editFaq');
Route::put('/updateFaq/{id}', [FaqController::class, 'updateFaq'])->name('updateFaq');
Route::get('/deleteFaq/{id}', [FaqController::class, 'deleteFaq'])->name('deleteFaq');


//Company History
Route::get('/manage-CompanyHistory', [CompanyHistoryController::class, 'CompanyHistory'])->name('CompanyHistory');
Route::post('/add-CompanyHistory', [CompanyHistoryController::class, 'addCompanyHistory'])->name('addCompanyHistory');
Route::get('/hideCompanyHistory/{id}', [CompanyHistoryController::class, 'hideCompanyHistory'])->name('hideCompanyHistory');
Route::get('/unhideCompanyHistory/{id}', [CompanyHistoryController::class, 'unhideCompanyHistory'])->name('unhideCompanyHistory');
Route::get('/editCompanyHistory/{id}', [CompanyHistoryController::class, 'editCompanyHistory'])->name('editCompanyHistory');
Route::put('/updateCompanyHistory/{id}', [CompanyHistoryController::class, 'updateCompanyHistory'])->name('updateCompanyHistory');
Route::get('/deleteCompanyHistory/{id}', [CompanyHistoryController::class, 'deleteCompanyHistory'])->name('deleteCompanyHistory');


//App store links
Route::get('/manage-AppStore', [AppStoreController::class, 'AppStore'])->name('AppStore');
Route::post('/add-AppStore', [AppStoreController::class, 'addAppStore'])->name('addAppStore');
Route::get('/hideAppStore/{id}', [AppStoreController::class, 'hideAppStore'])->name('hideAppStore');
Route::get('/unhideAppStore/{id}', [AppStoreController::class, 'unhideAppStore'])->name('unhideAppStore');
Route::get('/editAppStore/{id}', [AppStoreController::class, 'editAppStore'])->name('editAppStore');
Route::put('/updateAppStore/{id}', [AppStoreController::class, 'updateAppStore'])->name('updateAppStore');
Route::get('/deleteAppStore/{id}', [AppStoreController::class, 'deleteAppStore'])->name('deleteAppStore');


//App store links
Route::get('/manage-Routing', [RoutingController::class, 'Routing'])->name('Routing');
Route::post('/add-Routing', [RoutingController::class, 'addRouting'])->name('addRouting');
Route::get('/hideRouting/{id}', [RoutingController::class, 'hideRouting'])->name('hideRouting');
Route::get('/unhideRouting/{id}', [RoutingController::class, 'unhideRouting'])->name('unhideRouting');
Route::get('/editRouting/{id}', [RoutingController::class, 'editRouting'])->name('editRouting');
Route::put('/updateRouting/{id}', [RoutingController::class, 'updateRouting'])->name('updateRouting');
Route::get('/deleteRouting/{id}', [RoutingController::class, 'deleteRouting'])->name('deleteRouting');


//App store links
Route::post('/add-EventCat', [EventCatController::class, 'addEventCat'])->name('addEventCat');
Route::get('/deleteEventCat/{id}', [EventCatController::class, 'deleteEventCat'])->name('deleteEventCat');

Route::post('/add-DealCat', [DealCatController::class, 'addDealCat'])->name('addDealCat');
Route::get('/deleteDealCat/{id}', [DealCatController::class, 'deleteDealCat'])->name('deleteDealCat');





//Manage Cafe
Route::get('/manage-Cafe', [CafeController::class, 'Cafe'])->name('Cafe');
Route::post('/add-Cafe', [CafeController::class, 'addCafe'])->name('addCafe');
Route::get('/hideCafe/{id}', [CafeController::class, 'hideCafe'])->name('hideCafe');
Route::get('/unhideCafe/{id}', [CafeController::class, 'unhideCafe'])->name('unhideCafe');
Route::get('/editCafe/{id}', [CafeController::class, 'editCafe'])->name('editCafe');
Route::put('/updateCafe/{id}', [CafeController::class, 'updateCafe'])->name('updateCafe');
Route::get('/deleteCafe/{id}', [CafeController::class, 'deleteCafe'])->name('deleteCafe');

//Manage Cafe categories
Route::post('/add-CafeCat', [CafeCatController::class, 'addCafeCat'])->name('addCafeCat');
Route::get('/deleteCafeCat/{id}', [CafeCatController::class, 'deleteCafeCat'])->name('deleteCafeCat');



//Manage Hotel
Route::get('/manage-Hotel', [HotelController::class, 'Hotel'])->name('Hotel');
Route::post('/add-Hotel', [HotelController::class, 'addHotel'])->name('addHotel');
Route::get('/hideHotel/{id}', [HotelController::class, 'hideHotel'])->name('hideHotel');
Route::get('/unhideHotel/{id}', [HotelController::class, 'unhideHotel'])->name('unhideHotel');
Route::get('/editHotel/{id}', [HotelController::class, 'editHotel'])->name('editHotel');
Route::put('/updateHotel/{id}', [HotelController::class, 'updateHotel'])->name('updateHotel');
Route::get('/deleteHotel/{id}', [HotelController::class, 'deleteHotel'])->name('deleteHotel');

//Manage CareRent
Route::get('/manage-CareRent', [CareRentController::class, 'CareRent'])->name('CareRent');
Route::post('/add-CareRent', [CareRentController::class, 'addCareRent'])->name('addCareRent');
Route::get('/hideCareRent/{id}', [CareRentController::class, 'hideCareRent'])->name('hideCareRent');
Route::get('/unhideCareRent/{id}', [CareRentController::class, 'unhideCareRent'])->name('unhideCareRent');
Route::get('/editCareRent/{id}', [CareRentController::class, 'editCareRent'])->name('editCareRent');
Route::put('/updateCareRent/{id}', [CareRentController::class, 'updateCareRent'])->name('updateCareRent');
Route::get('/deleteCareRent/{id}', [CareRentController::class, 'deleteCareRent'])->name('deleteCareRent');


//Manage ContactUs
Route::get('/manage-Contact', [ContactController::class, 'Contact'])->name('Contact');
Route::post('/add-Contact', [ContactController::class, 'addContact'])->name('addContact');
Route::get('/hideContact/{id}', [ContactController::class, 'hideContact'])->name('hideContact');
Route::get('/unhideContact/{id}', [ContactController::class, 'unhideContact'])->name('unhideContact');
Route::get('/editContact/{id}', [ContactController::class, 'editContact'])->name('editContact');
Route::put('/updateContact/{id}', [ContactController::class, 'updateContact'])->name('updateContact');
Route::get('/deleteContact/{id}', [ContactController::class, 'deleteContact'])->name('deleteContact');


Route::post('/add-Baggage', [BaggageController::class, 'addBaggage'])->name('addBaggage');
Route::put('/updateBaggage/{id}', [BaggageController::class, 'updateBaggage'])->name('updateBaggage');


Route::get('/Baggage', function () {
  return view('bagagge');
});

Route::get('verify-payment/{reference}', [PaymentController::class, 'Paymen'])->name('payment.verify');
Route::get('/paymentList', [PaymentController::class, 'paymentList'])->name('paymentList');


//Manage Cabin
Route::get('/manage-Cabin', [CabinController::class, 'Cabin'])->name('Cabin');
Route::post('/add-Cabin', [CabinController::class, 'addCabin'])->name('addCabin');
Route::get('/hideCabin/{id}', [CabinController::class, 'hideCabin'])->name('hideCabin');
Route::get('/unhideCabin/{id}', [CabinController::class, 'unhideCabin'])->name('unhideCabin');
Route::get('/editCabin/{id}', [CabinController::class, 'editCabin'])->name('editCabin');
Route::put('/updateCabin/{id}', [CabinController::class, 'updateCabin'])->name('updateCabin');
Route::get('/deleteCabin/{id}', [CabinController::class, 'deleteCabin'])->name('deleteCabin');


//Manage Deal
Route::get('/manage-Deal', [DealController::class, 'Deal'])->name('Deal');
Route::post('/add-Deal', [DealController::class, 'addDeal'])->name('addDeal');
Route::get('/hideDeal/{id}', [DealController::class, 'hideDeal'])->name('hideDeal');
Route::get('/unhideDeal/{id}', [DealController::class, 'unhideDeal'])->name('unhideDeal');
Route::get('/editDeal/{id}', [DealController::class, 'editDeal'])->name('editDeal');
Route::put('/updateDeal/{id}', [DealController::class, 'updateDeal'])->name('updateDeal');
Route::get('/deleteDeal/{id}', [DealController::class, 'deleteDeal'])->name('deleteDeal');

Route::post('/add-DealOfferCat', [DealOfferCatController::class, 'addDealOfferCat'])->name('addDealOfferCat');
Route::get('/deleteDealOfferCat/{id}', [DealOfferCatController::class, 'deleteDealOfferCat'])->name('deleteDealOfferCat');



//Manage Seat Training
Route::get('/editTraining', [TrainingController::class, 'editTraining'])->name('editTraining');
Route::put('/updateTraining/{id}', [TrainingController::class, 'updateTraining'])->name('updateTraining');



//Manage Tourist
Route::get('/manage-Tourist', [TouristController::class, 'Tourist'])->name('Tourist');
Route::post('/add-Tourist', [TouristController::class, 'addTourist'])->name('addTourist');
Route::get('/hideTourist/{id}', [TouristController::class, 'hideTourist'])->name('hideTourist');
Route::get('/unhideTourist/{id}', [TouristController::class, 'unhideTourist'])->name('unhideTourist');
Route::get('/editTourist/{id}', [TouristController::class, 'editTourist'])->name('editTourist');
Route::put('/updateTourist/{id}', [TouristController::class, 'updateTourist'])->name('updateTourist');
Route::get('/deleteTourist/{id}', [TouristController::class, 'deleteTourist'])->name('deleteTourist');

//Manage Tourist categories
Route::post('/add-TouristCat', [TouristCatController::class, 'addTouristCat'])->name('addTouristCat');
Route::get('/deleteTouristCat/{id}', [TouristCatController::class, 'deleteTouristCat'])->name('deleteTouristCat');

//Manage TravelExtra
Route::get('/manage-TravelExtra', [TravelExtraController::class, 'TravelExtra'])->name('TravelExtra');
Route::post('/add-TravelExtra', [TravelExtraController::class, 'addTravelExtra'])->name('addTravelExtra');
Route::get('/hideTravelExtra/{id}', [TravelExtraController::class, 'hideTravelExtra'])->name('hideTravelExtra');
Route::get('/unhideTravelExtra/{id}', [TravelExtraController::class, 'unhideTravelExtra'])->name('unhideTravelExtra');
Route::get('/editTravelExtra/{id}', [TravelExtraController::class, 'editTravelExtra'])->name('editTravelExtra');
Route::put('/updateTravelExtra/{id}', [TravelExtraController::class, 'updateTravelExtra'])->name('updateTravelExtra');
Route::get('/deleteTravelExtra/{id}', [TravelExtraController::class, 'deleteTravelExtra'])->name('deleteTravelExtra');

Route::get('/editTravelExtraSlider/', [TravelExtraController::class, 'editTravelExtraSlider'])->name('editTravelExtraSlider');
Route::put('/updateTravelExtraSlider/{id}', [TravelExtraController::class, 'updateTravelExtraSlider'])->name('updateTravelExtraSlider');


Route::get('/editTravelExtraFooter/', [TravelExtraController::class, 'editTravelExtraFooter'])->name('editTravelExtraFooter');
Route::put('/updateTravelExtraFooter/{id}', [TravelExtraController::class, 'updateTravelExtraFooter'])->name('updateTravelExtraFooter');



//Manage Special
Route::get('/manage-Special', [SpecialController::class, 'Special'])->name('Special');
Route::post('/add-Special', [SpecialController::class, 'addSpecial'])->name('addSpecial');
Route::get('/hideSpecial/{id}', [SpecialController::class, 'hideSpecial'])->name('hideSpecial');
Route::get('/unhideSpecial/{id}', [SpecialController::class, 'unhideSpecial'])->name('unhideSpecial');
Route::get('/editSpecial/{id}', [SpecialController::class, 'editSpecial'])->name('editSpecial');
Route::put('/updateSpecial/{id}', [SpecialController::class, 'updateSpecial'])->name('updateSpecial');
Route::get('/deleteSpecial/{id}', [SpecialController::class, 'deleteSpecial'])->name('deleteSpecial');

Route::get('/editSpecialSlider/', [SpecialController::class, 'editSpecialSlider'])->name('editSpecialSlider');
Route::put('/updateSpecialSlider/{id}', [SpecialController::class, 'updateSpecialSlider'])->name('updateSpecialSlider');

//Manage special assist form
Route::get('/manage-Assistform', [SpecialController::class, 'index'])->name('assistform');

Route::get('/viewform/{id}', [SpecialController::class, 'viewform'])->name('viewform');



// unsubscribeUrl
Route::get('/unsubscribeUrl/{id}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');


//Manage Award
Route::get('/manage-Award', [AwardController::class, 'Award'])->name('Award');
Route::post('/add-Award', [AwardController::class, 'addAward'])->name('addAward');
Route::get('/hideAward/{id}', [AwardController::class, 'hideAward'])->name('hideAward');
Route::get('/unhideAward/{id}', [AwardController::class, 'unhideAward'])->name('unhideAward');
Route::get('/editAward/{id}', [AwardController::class, 'editAward'])->name('editAward');
Route::put('/updateAward/{id}', [AwardController::class, 'updateAward'])->name('updateAward');
Route::get('/deleteAward/{id}', [AwardController::class, 'deleteAward'])->name('deleteAward');




//Manage Seat
Route::get('/manage-Seat', [SeatController::class, 'Seat'])->name('Seat');
Route::post('/add-Seat', [SeatController::class, 'addSeat'])->name('addSeat');
Route::get('/hideSeat/{id}', [SeatController::class, 'hideSeat'])->name('hideSeat');
Route::get('/unhideSeat/{id}', [SeatController::class, 'unhideSeat'])->name('unhideSeat');
Route::get('/editSeat/{id}', [SeatController::class, 'editSeat'])->name('editSeat');
Route::put('/updateSeat/{id}', [SeatController::class, 'updateSeat'])->name('updateSeat');
Route::get('/deleteSeat/{id}', [SeatController::class, 'deleteSeat'])->name('deleteSeat');

//Manage Seat categories
Route::post('/add-SeatCat', [SeatCatController::class, 'addSeatCat'])->name('addSeatCat');
Route::get('/deleteSeatCat/{id}', [SeatCatController::class, 'deleteSeatCat'])->name('deleteSeatCat');

//Manage Parkss
Route::get('/manage-Park', [ParkingSpotController::class, 'index'])->name('Park');
Route::post('/add-Park', [ParkingSpotController::class, 'store'])->name('addPark');
Route::get('/hidePark/{id}', [ParkingSpotController::class, 'hidePark'])->name('hidePark');
Route::get('/unhidePark/{id}', [ParkingSpotController::class, 'unhidePark'])->name('unhidePark');
Route::get('/editPark/{id}', [ParkingSpotController::class, 'editPark'])->name('editPark');
Route::put('/updatePark/{id}', [ParkingSpotController::class, 'updatePark'])->name('updatePark');
Route::get('/deletePark/{id}', [ParkingSpotController::class, 'deletePark'])->name('deletePark');


//Manage Parkss
Route::get('/manage-ReservedPark', [ReservationController::class, 'index'])->name('BookedPark');

Route::get('/viewBook/{id}', [ReservationController::class, 'viewBook'])->name('viewBook');



//Manage SpecialOffers
Route::get('/manage-SpecialOffers', [SpecialOffersController::class, 'SpecialOffers'])->name('SpecialOffers');
Route::post('/add-SpecialOffers', [SpecialOffersController::class, 'addSpecialOffers'])->name('addSpecialOffers');
Route::get('/hideSpecialOffers/{id}', [SpecialOffersController::class, 'hideSpecialOffers'])->name('hideSpecialOffers');
Route::get('/unhideSpecialOffers/{id}', [SpecialOffersController::class, 'unhideSpecialOffers'])->name('unhideSpecialOffers');
Route::get('/editSpecialOffers/{id}', [SpecialOffersController::class, 'editSpecialOffers'])->name('editSpecialOffers');
Route::put('/updateSpecialOffers/{id}', [SpecialOffersController::class, 'updateSpecialOffers'])->name('updateSpecialOffers');
Route::get('/deleteSpecialOffers/{id}', [SpecialOffersController::class, 'deleteSpecialOffers'])->name('deleteSpecialOffers');



//Manage CafeHeader
Route::get('/manage-CafeHeader', [CafeHeaderController::class, 'CafeHeader'])->name('CafeHeader');
Route::post('/add-CafeHeader', [CafeHeaderController::class, 'addCafeHeader'])->name('addCafeHeader');
Route::get('/hideCafeHeader/{id}', [CafeHeaderController::class, 'hideCafeHeader'])->name('hideCafeHeader');
Route::get('/unhideCafeHeader/{id}', [CafeHeaderController::class, 'unhideCafeHeader'])->name('unhideCafeHeader');
Route::get('/editCafeHeader/{id}', [CafeHeaderController::class, 'editCafeHeader'])->name('editCafeHeader');
Route::put('/updateCafeHeader/{id}', [CafeHeaderController::class, 'updateCafeHeader'])->name('updateCafeHeader');
Route::get('/deleteCafeHeader/{id}', [CafeHeaderController::class, 'deleteCafeHeader'])->name('deleteCafeHeader');

//Manage SeatHeader
Route::get('/manage-SeatHeader', [SeatHeaderController::class, 'SeatHeader'])->name('SeatHeader');
Route::post('/add-SeatHeader', [SeatHeaderController::class, 'addSeatHeader'])->name('addSeatHeader');
Route::get('/hideSeatHeader/{id}', [SeatHeaderController::class, 'hideSeatHeader'])->name('hideSeatHeader');
Route::get('/unhideSeatHeader/{id}', [SeatHeaderController::class, 'unhideSeatHeader'])->name('unhideSeatHeader');
Route::get('/editSeatHeader/{id}', [SeatHeaderController::class, 'editSeatHeader'])->name('editSeatHeader');
Route::put('/updateSeatHeader/{id}', [SeatHeaderController::class, 'updateSeatHeader'])->name('updateSeatHeader');
Route::get('/deleteSeatHeader/{id}', [SeatHeaderController::class, 'deleteSeatHeader'])->name('deleteSeatHeader');
//Seatfooter
Route::get('/editSeatFooter/', [SeatController::class, 'editSeatFooter'])->name('editSeatFooter');
Route::put('/updateSeatFooter/{id}', [SeatController::class, 'updateSeatFooter'])->name('updateSeatFooter');



//Manage Assist
Route::get('/manage-Assist', [AssistController::class, 'Assist'])->name('Assist');
Route::post('/add-Assist', [AssistController::class, 'addAssist'])->name('addAssist');
Route::get('/hideAssist/{id}', [AssistController::class, 'hideAssist'])->name('hideAssist');
Route::get('/unhideAssist/{id}', [AssistController::class, 'unhideAssist'])->name('unhideAssist');
Route::get('/editAssist/{id}', [AssistController::class, 'editAssist'])->name('editAssist');
Route::put('/updateAssist/{id}', [AssistController::class, 'updateAssist'])->name('updateAssist');
Route::get('/deleteAssist/{id}', [AssistController::class, 'deleteAssist'])->name('deleteAssist');

//Manage HotelSlider
Route::get('/manage-HotelSlider', [HotelSliderController::class, 'HotelSlider'])->name('HotelSlider');
Route::post('/add-HotelSlider', [HotelSliderController::class, 'addHotelSlider'])->name('addHotelSlider');
Route::get('/hideHotelSlider/{id}', [HotelSliderController::class, 'hideHotelSlider'])->name('hideHotelSlider');
Route::get('/unhideHotelSlider/{id}', [HotelSliderController::class, 'unhideHotelSlider'])->name('unhideHotelSlider');
Route::get('/editHotelSlider/{id}', [HotelSliderController::class, 'editHotelSlider'])->name('editHotelSlider');
Route::put('/updateHotelSlider/{id}', [HotelSliderController::class, 'updateHotelSlider'])->name('updateHotelSlider');
Route::get('/deleteHotelSlider/{id}', [HotelSliderController::class, 'deleteHotelSlider'])->name('deleteHotelSlider');



//Manage TouristHeader
Route::get('/manage-TouristHeader', [TouristHeaderController::class, 'TouristHeader'])->name('TouristHeader');
Route::post('/add-TouristHeader', [TouristHeaderController::class, 'addTouristHeader'])->name('addTouristHeader');
Route::get('/hideTouristHeader/{id}', [TouristHeaderController::class, 'hideTouristHeader'])->name('hideTouristHeader');
Route::get('/unhideTouristHeader/{id}', [TouristHeaderController::class, 'unhideTouristHeader'])->name('unhideTouristHeader');
Route::get('/editTouristHeader/{id}', [TouristHeaderController::class, 'editTouristHeader'])->name('editTouristHeader');
Route::put('/updateTouristHeader/{id}', [TouristHeaderController::class, 'updateTouristHeader'])->name('updateTouristHeader');
Route::get('/deleteTouristHeader/{id}', [TouristHeaderController::class, 'deleteTouristHeader'])->name('deleteTouristHeader');

//Manage ParkHeader
Route::get('/manage-ParkHeader', [ParkHeaderController::class, 'ParkHeader'])->name('ParkHeader');
Route::post('/add-ParkHeader', [ParkHeaderController::class, 'addParkHeader'])->name('addParkHeader');
Route::get('/hideParkHeader/{id}', [ParkHeaderController::class, 'hideParkHeader'])->name('hideParkHeader');
Route::get('/unhideParkHeader/{id}', [ParkHeaderController::class, 'unhideParkHeader'])->name('unhideParkHeader');
Route::get('/editParkHeader/{id}', [ParkHeaderController::class, 'editParkHeader'])->name('editParkHeader');
Route::put('/updateParkHeader/{id}', [ParkHeaderController::class, 'updateParkHeader'])->name('updateParkHeader');
Route::get('/deleteParkHeader/{id}', [ParkHeaderController::class, 'deleteParkHeader'])->name('deleteParkHeader');

//Manage Term
Route::get('/manage-Term', [TermController::class, 'Term'])->name('Term');
Route::post('/add-Term', [TermController::class, 'addTerm'])->name('addTerm');
Route::get('/hideTerm/{id}', [TermController::class, 'hideTerm'])->name('hideTerm');
Route::get('/unhideTerm/{id}', [TermController::class, 'unhideTerm'])->name('unhideTerm');
Route::get('/editTerm/{id}', [TermController::class, 'editTerm'])->name('editTerm');
Route::put('/updateTerm/{id}', [TermController::class, 'updateTerm'])->name('updateTerm');
Route::get('/deleteTerm/{id}', [TermController::class, 'deleteTerm'])->name('deleteTerm');

//Manage TermHeader
Route::get('/manage-TermHeader', [TermHeaderController::class, 'TermHeader'])->name('TermHeader');
Route::post('/add-TermHeader', [TermHeaderController::class, 'addTermHeader'])->name('addTermHeader');
Route::get('/hideTermHeader/{id}', [TermHeaderController::class, 'hideTermHeader'])->name('hideTermHeader');
Route::get('/unhideTermHeader/{id}', [TermHeaderController::class, 'unhideTermHeader'])->name('unhideTermHeader');
Route::get('/editTermHeader/{id}', [TermHeaderController::class, 'editTermHeader'])->name('editTermHeader');
Route::put('/updateTermHeader/{id}', [TermHeaderController::class, 'updateTermHeader'])->name('updateTermHeader');
Route::get('/deleteTermHeader/{id}', [TermHeaderController::class, 'deleteTermHeader'])->name('deleteTermHeader');


//Manage ContactDetail
Route::get('/manage-ContactDetail', [ContactDetailController::class, 'ContactDetail'])->name('ContactDetail');
Route::post('/add-ContactDetail', [ContactDetailController::class, 'addContactDetail'])->name('addContactDetail');
Route::get('/hideContactDetail/{id}', [ContactDetailController::class, 'hideContactDetail'])->name('hideContactDetail');
Route::get('/unhideContactDetail/{id}', [ContactDetailController::class, 'unhideContactDetail'])->name('unhideContactDetail');
Route::get('/editContactDetail/{id}', [ContactDetailController::class, 'editContactDetail'])->name('editContactDetail');
Route::put('/updateContactDetail/{id}', [ContactDetailController::class, 'updateContactDetail'])->name('updateContactDetail');
Route::get('/deleteContactDetail/{id}', [ContactDetailController::class, 'deleteContactDetail'])->name('deleteContactDetail');

//Manage BaggageTable
Route::get('/manage-BaggageTable', [BaggageTableController::class, 'BaggageTable'])->name('BaggageTable');
Route::post('/add-BaggageTable', [BaggageTableController::class, 'addBaggageTable'])->name('addBaggageTable');
Route::get('/hideBaggageTable/{id}', [BaggageTableController::class, 'hideBaggageTable'])->name('hideBaggageTable');
Route::get('/unhideBaggageTable/{id}', [BaggageTableController::class, 'unhideBaggageTable'])->name('unhideBaggageTable');
Route::get('/editBaggageTable/{id}', [BaggageTableController::class, 'editBaggageTable'])->name('editBaggageTable');
Route::put('/updateBaggageTable/{id}', [BaggageTableController::class, 'updateBaggageTable'])->name('updateBaggageTable');
Route::get('/deleteBaggageTable/{id}', [BaggageTableController::class, 'deleteBaggageTable'])->name('deleteBaggageTable');


//Manage DealHeader
Route::get('/manage-DealHeader', [DealHeaderController::class, 'DealHeader'])->name('DealHeader');
Route::post('/add-DealHeader', [DealHeaderController::class, 'addDealHeader'])->name('addDealHeader');
Route::get('/hideDealHeader/{id}', [DealHeaderController::class, 'hideDealHeader'])->name('hideDealHeader');
Route::get('/unhideDealHeader/{id}', [DealHeaderController::class, 'unhideDealHeader'])->name('unhideDealHeader');
Route::get('/editDealHeader/{id}', [DealHeaderController::class, 'editDealHeader'])->name('editDealHeader');
Route::put('/updateDealHeader/{id}', [DealHeaderController::class, 'updateDealHeader'])->name('updateDealHeader');
Route::get('/deleteDealHeader/{id}', [DealHeaderController::class, 'deleteDealHeader'])->name('deleteDealHeader');

//Manage CareHeader
Route::get('/manage-CareHeader', [CareHeaderController::class, 'CareHeader'])->name('CareHeader');
Route::post('/add-CareHeader', [CareHeaderController::class, 'addCareHeader'])->name('addCareHeader');
Route::get('/hideCareHeader/{id}', [CareHeaderController::class, 'hideCareHeader'])->name('hideCareHeader');
Route::get('/unhideCareHeader/{id}', [CareHeaderController::class, 'unhideCareHeader'])->name('unhideCareHeader');
Route::get('/editCareHeader/{id}', [CareHeaderController::class, 'editCareHeader'])->name('editCareHeader');
Route::put('/updateCareHeader/{id}', [CareHeaderController::class, 'updateCareHeader'])->name('updateCareHeader');
Route::get('/deleteCareHeader/{id}', [CareHeaderController::class, 'deleteCareHeader'])->name('deleteCareHeader');

//Manage CourseCat
Route::get('/manage-CourseCat', [CourseCatController::class, 'CourseCat'])->name('CourseCat');
Route::post('/add-CourseCat', [CourseCatController::class, 'addCourseCat'])->name('addCourseCat');
Route::get('/hideCourseCat/{id}', [CourseCatController::class, 'hideCourseCat'])->name('hideCourseCat');
Route::get('/unhideCourseCat/{id}', [CourseCatController::class, 'unhideCourseCat'])->name('unhideCourseCat');
Route::get('/editCourseCat/{id}', [CourseCatController::class, 'editCourseCat'])->name('editCourseCat');
Route::put('/updateCourseCat/{id}', [CourseCatController::class, 'updateCourseCat'])->name('updateCourseCat');
Route::get('/deleteCourseCat/{id}', [CourseCatController::class, 'deleteCourseCat'])->name('deleteCourseCat');

//Manage Course
Route::get('/manage-Course', [CourseController::class, 'Course'])->name('Course');
Route::post('/add-Course', [CourseController::class, 'addCourse'])->name('addCourse');
Route::get('/hideCourse/{id}', [CourseController::class, 'hideCourse'])->name('hideCourse');
Route::get('/unhideCourse/{id}', [CourseController::class, 'unhideCourse'])->name('unhideCourse');
Route::get('/editCourse/{id}', [CourseController::class, 'editCourse'])->name('editCourse');
Route::put('/updateCourse/{id}', [CourseController::class, 'updateCourse'])->name('updateCourse');
Route::get('/deleteCourse/{id}', [CourseController::class, 'deleteCourse'])->name('deleteCourse');


//Manage WebBonus
Route::get('/manage-WebBonus', [WebBonusController::class, 'WebBonus'])->name('WebBonus');
Route::post('/add-WebBonus', [WebBonusController::class, 'addWebBonus'])->name('addWebBonus');
Route::get('/hideWebBonus/{id}', [WebBonusController::class, 'hideWebBonus'])->name('hideWebBonus');
Route::get('/unhideWebBonus/{id}', [WebBonusController::class, 'unhideWebBonus'])->name('unhideWebBonus');
Route::get('/editWebBonus/{id}', [WebBonusController::class, 'editWebBonus'])->name('editWebBonus');
Route::put('/updateWebBonus/{id}', [WebBonusController::class, 'updateWebBonus'])->name('updateWebBonus');
Route::get('/deleteWebBonus/{id}', [WebBonusController::class, 'deleteWebBonus'])->name('deleteWebBonus');



// Route for Human Resources

Route::get('/job-listings', [HumanResourcesController::class, 'joblistings']);
Route::post('/add-job-listings', [HumanResourcesController::class, 'addJobListings']);
Route::get('/delete-job-listings/{id}', [HumanResourcesController::class, 'deleteJobListings']);
Route::post('/update-job-listings/{id}', [HumanResourcesController::class, 'updateJobListings']);

//Route for Job Applicants
Route::post('applicant_register', [HumanResourcesController::class, 'applicant_register']);
Route::post('update_applicant_profile', [HumanResourcesController::class, 'update_applicant_profile']);
Route::get('applicant_information/{id}', [HumanResources::class, 'applicant_information']);
Route::get('/delete_applicant/{id}', [HumanResources::class, 'delete_applicant']);

//Route for Job Applications
Route::get('/job_applicants/{id}', [HumanResources::class, 'job_applicants']);
