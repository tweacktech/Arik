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
use App\Http\Controllers\APIBonusController;
use App\Http\Controllers\APIFaqController;
use App\Http\Controllers\APIQuickBoxController;
use App\Http\Controllers\APIMissionVissionController;
use App\Http\Controllers\APIAppStoreController;
use App\Http\Controllers\APIRoutingController;
use App\Http\Controllers\APICafeController;
use App\Http\Controllers\APIHotelController;
use App\Http\Controllers\APICareRentController;
use App\Http\Controllers\APIContactController;
use App\Http\Controllers\APIBaggageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\APICabinController;
use App\Http\Controllers\APITrainController;
use App\Http\Controllers\APIDealController;
use App\Http\Controllers\APITouristController;
use App\Http\Controllers\APITravelExtraController;
use App\Http\Controllers\APISpecialController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\APIAwardController;
use App\Http\Controllers\APISeatController;
use App\Http\Controllers\APISpecialOffersController;
use App\Http\Controllers\APIParkingSpotController;
use App\Http\Controllers\ParkPaymentController;
use App\Http\Controllers\APIBaggageTableController;
use App\Http\Controllers\APIJobController;
use App\Http\Controllers\APIWebBonusController;



Route::post('/website', [APIWebMenuController::class, 'website'])->name('website');
Route::post('/homepage', [APIHomePageController::class, 'homepage'])->name('homepage');

Route::post('/menu', [APIWebMenuController::class, 'menu'])->name('menu');
Route::post('/menus', [APIWebMenuController::class, 'menus'])->name('menus');
Route::post('/submenu', [APIWebMenuController::class, 'submenu'])->name('submenu');

Route::post('/history', [APIWebController::class, 'history'])->name('history');
Route::post('/aboutimage', [APIWebController::class, 'aboutimage'])->name('aboutimage');
Route::post('/aboutus', [APIWebController::class, 'aboutus'])->name('aboutus');
Route::post('/terms', [APIWebController::class, 'terms'])->name('terms');
Route::post('/termheader', [APIWebController::class, 'termheader'])->name('termheader');
Route::post('/policy', [APIWebController::class, 'policy'])->name('policy');
Route::post('/policyimage', [APIWebController::class, 'policyimage'])->name('policyimage');

Route::post('/baggage', [APIWebController::class, 'baggage'])->name('baggage');
Route::post('/baggageimage', [APIWebController::class, 'baggageimage'])->name('baggageimage');


Route::post('/mission', [APIWebController::class, 'mission'])->name('mission');
Route::post('/logo', [APIWebController::class, 'Logo'])->name('logo');
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
Route::post('/newseventlabel', [APINewsEventController::class, 'NewsEventLabel'])->name('NewsEventLabel');
Route::get('/newsevent/{id}', [APINewsEventController::class, 'showNewsEvent'])->name('showNewsEvent');

Route::post('/dealsoffer', [APIDealsOfferController::class, 'DealsOffer'])->name('DealsOffer');
Route::post('/dealsicon', [APIDealsOfferController::class, 'Dealsicon'])->name('Dealsicon');
Route::post('/dealslable', [APIDealsOfferController::class, 'Dealslable'])->name('Dealslable');
Route::get('/dealsoffer/{id}', [APIDealsOfferController::class, 'showDealsOffer'])->name('showDealsOffer');

Route::post('/destination', [APIDestinationController::class, 'Destination'])->name('Destination');
Route::post('/destinationlabel', [APIDestinationController::class, 'DestinationLabel'])->name('DestinationLabel');
Route::get('/destination/{id}', [APIDestinationController::class, 'showDestination'])->name('showDestination');


Route::post('/commercial', [APICommercialController::class, 'Commercial'])->name('Commercial');
Route::get('/commercial/{id}', [APICommercialController::class, 'showCommercial'])->name('showCommercial');


Route::post('/category', [APICategoryController::class, 'category'])->name('category');
Route::post('/subcategory', [APICategoryController::class, 'subcategory'])->name('subcategory');


Route::post('/footer', [APIFooterController::class, 'footer'])->name('footer');


Route::post('/bonus', [APIBonusController::class, 'Bonus'])->name('bonus');
Route::get('/bonus/{id}', [APIBonusController::class, 'showBonus'])->name('showbonus');

Route::post('/Faq', [APIFaqController::class, 'Faq'])->name('Faq');
Route::get('/Faq/{id}', [APIFaqController::class, 'showFaq'])->name('showFaq');

Route::post('/quick', [APIQuickBoxController::class, 'QuickBox'])->name('QuickBox');
Route::get('/quick/{id}', [APIQuickBoxController::class, 'showQuickBox'])->name('showQuickBox');

Route::post('/MissionVission', [APIMissionVissionController::class, 'MissionVission'])->name('MissionVission');
Route::get('/MissionVission/{id}', [APIMissionVissionController::class, 'showMissionVission'])->name('showMissionVission');

Route::post('/appstore', [APIAppStoreController::class, 'AppStore'])->name('AppStore');
Route::get('/appstore/{id}', [APIAppStoreController::class, 'showAppStore'])->name('showAppStore');

Route::post('/routing', [APIRoutingController::class, 'Routing'])->name('Routing');
Route::get('/routing/{id}', [APIRoutingController::class, 'showRouting'])->name('showRouting');


Route::post('/cafe', [APICafeController::class, 'Cafe'])->name('Cafe');
Route::get('/cafe/{id}', [APICafeController::class, 'showCafe'])->name('showCafe');

Route::post('/cafe-cat', [APICafeController::class, 'CafeCat'])->name('CafeCat');
Route::get('/cafe-cat/{id}', [APICafeController::class, 'showCafecat'])->name('showCafeCat');

Route::post('/cafe-header', [APICafeController::class, 'CafeHeader'])->name('CafeHeader');
Route::get('/cafe-header/{id}', [APICafeController::class, 'showCafeHeader'])->name('showCafeHeader');

Route::post('/hotel', [APIHotelController::class, 'Hotel'])->name('Hotel');
Route::get('/hotel/{id}', [APIHotelController::class, 'showHotel'])->name('showHotel');

Route::post('/hotelslider', [APIHotelController::class, 'HotelSlider'])->name('HotelSlider');
Route::get('/hotelslider/{id}', [APIHotelController::class, 'showHotelSlider'])->name('showHotelSlider');


Route::post('/care', [APICareRentController::class, 'CareRent'])->name('CareRent');
Route::get('/care/{id}', [APICareRentController::class, 'showCareRent'])->name('showCareRent');

Route::post('/careheader', [APICareRentController::class, 'CareHeader'])->name('CareHeader');
Route::get('/careheader/{id}', [APICareRentController::class, 'showCareHeader'])->name('showCareHeader');


Route::post('/contact', [APIContactController::class, 'Contact'])->name('Contact');

Route::post('/contactForm', [APIContactController::class, 'ContactForm'])->name('ContactForm');
// Route::get('/contact/{id}', [APIContactController::class, 'showContact'])->name('showContact');
Route::post('/contactstate', [APIContactController::class, 'ContactDetail'])->name('ContactDetail');
Route::get('/contactstate/{id}', [APIContactController::class, 'showContactDetail'])->name('showContactDetail');


// for Baggage kg per price
Route::post('/baggage-price', [APIBaggageController::class, 'Baggage'])->name('Baggage');

Route::get('verify-payment/{reference}', [PaymentController::class, 'Paymen'])->name('payment.verify');

Route::post('/cabin', [APICabinController::class, 'Cabin'])->name('Cabin');
Route::get('/cabin/{id}', [APICabinController::class, 'showCabin'])->name('showCabin');


Route::post('/deal', [APIDealController::class, 'Deal'])->name('Deal');
Route::get('/deal/{id}', [APIDealController::class, 'showDeal'])->name('showDeal');


Route::post('/offercat', [APIDealController::class, 'DealOfferCat'])->name('DealOfferCat');
Route::get('/offercat/{id}', [APIDealController::class, 'showDealOfferCat'])->name('showDealOfferCat');

Route::post('/dealheader', [APIDealController::class, 'DealHeader'])->name('DealHeader');
Route::get('/dealheader/{id}', [APIDealController::class, 'showDealHeader'])->name('showDealHeader');


Route::post('/training', [APITrainController::class, 'Training'])->name('Training');
Route::post('/coursecat', [APITrainController::class, 'CourseCat'])->name('CourseCat');
Route::get('/coursecat/{id}', [APITrainController::class, 'showCourseCat'])->name('showCourseCat');
Route::post('/course', [APITrainController::class, 'Course'])->name('Course');
Route::get('/course/{id}', [APITrainController::class, 'showCourse'])->name('showCourse');

Route::post('/tourist', [APITouristController::class, 'Tourist'])->name('Tourist');
Route::get('/tourist/{id}', [APITouristController::class, 'showTourist'])->name('showTourist');

Route::get('/touristheader/{id}', [APITouristController::class, 'showTouristHeader'])->name('showTouristHeader');
Route::post('/touristheader', [APITouristController::class, 'TouristHeader'])->name('TouristHeader');

Route::post('/tourist-cat', [APITouristController::class, 'TouristCat'])->name('TouristCat');
Route::get('/tourist-cat/{id}', [APITouristController::class, 'showTouristcat'])->name('showTouristCat');


Route::post('/travelextra', [APITravelExtraController::class, 'TravelExtra'])->name('TravelExtra');
Route::get('/travelextra/{id}', [APITravelExtraController::class, 'showTravelExtra'])->name('showTravelExtra');
Route::post('/travelextraslider', [APITravelExtraController::class, 'TravelExtraSlider'])->name('TravelExtraSlider');
Route::post('/travelextrafooter', [APITravelExtraController::class, 'TravelExtraFooter'])->name('TravelExtraFooter');

Route::post('/special', [APISpecialController::class, 'Special'])->name('Special');
Route::get('/special/{id}', [APISpecialController::class, 'showSpecial'])->name('showSpecial');

Route::post('/assist', [APISpecialController::class, 'Assist'])->name('Assist');
Route::get('/assist/{id}', [APISpecialController::class, 'showAssist'])->name('showAssist');

Route::post('/specialslider', [APISpecialController::class, 'SpecialSlider'])->name('SpecialSlider');
Route::post('/specialform', [APISpecialController::class, 'SpecialForm'])->name('SpecialForm');

Route::post('/subscribe', [SubscriptionController::class, 'processSubscription'])->name('subscribe.submit');
Route::post('/unsubscribe/', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

Route::post('/award', [APIAwardController::class, 'Award'])->name('Award');
Route::get('/award/{id}', [APIAwardController::class, 'showAward'])->name('showAward');


Route::post('/seat', [APISeatController::class, 'Seat'])->name('Seat');
Route::get('/seat/{id}', [APISeatController::class, 'showSeat'])->name('showSeat');

Route::post('/seatheader', [APISeatController::class, 'SeatHeader'])->name('SeatHeader');
Route::post('/seatfooter', [APISeatController::class, 'SeatFooter'])->name('SeatFooter');
Route::get('/seatheader/{id}', [APISeatController::class, 'showSeatHeader'])->name('showSeatHeader');

Route::post('/seat-cat', [APISeatController::class, 'SeatCat'])->name('SeatCat');
Route::get('/seat-cat/{id}', [APISeatController::class, 'showSeatcat'])->name('showSeatCat');


Route::post('/parkingspot', [APIParkingSpotController::class, 'ParkingSpot'])->name('ParkingSpot');
Route::get('/parkingspot/{id}', [APIParkingSpotController::class, 'showParkingSpot'])->name('showParkingSpot');

Route::post('/parkheader', [APIParkingSpotController::class, 'ParkHeader'])->name('ParkHeader');
Route::get('/parkheader/{id}', [APIParkingSpotController::class, 'showParkHeader'])->name('showParkHeader');


Route::get('verify-parkpayment/{reference}', [ParkPaymentController::class, 'Paymen'])->name('payment.verify');


Route::post('/specialoffers', [APISpecialOffersController::class, 'SpecialOffers'])->name('SpecialOffers');
Route::get('/specialoffers/{id}', [APISpecialOffersController::class, 'showSpecialOffers'])->name('showSpecialOffers');

Route::post('/baggagetable', [APIBaggageTableController::class, 'BaggageTable'])->name('BaggageTable');
Route::get('/baggagetable/{id}', [APIBaggageTableController::class, 'showBaggageTable'])->name('showBaggageTable');


Route::post('/webbonus', [APIWebBonusController::class, 'WebBonus'])->name('WebBonus');
Route::get('/webbonus/{id}', [APIWebBonusController::class, 'showWebBonus'])->name('showWebBonus');


//Api Route for Job portal login and application.
Route::post('/job_signup', [APIJobController::class, 'sign_up']);

Route::post('/job_login', [APIJobController::class, 'login']);
Route::get('/joblist', [APIJobController::class, 'joblists']);
Route::get('/jobdetails/{id}', [APIJobController::class, 'jobdetails']);
Route::get('/jobschedules/{id}', [APIJobController::class, 'jobschedules']);
Route::get('/myapplications/{id}', [APIJobController::class, 'myapplications']);
Route::post('/addtosavedjobs', [APIJobController::class, 'addtosavedjobs']);

Route::get('/view_saved_jobs/{id}', [APIJobController::class, 'view_saved_jobs']);
Route::get('/delete_saved_jobs/{id}', [APIJobController::class, 'delete_saved_jobs']);


Route::get('/search_jobs/{id}', [APIJobController::class, 'searchJobs']);
