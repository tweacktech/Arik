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
