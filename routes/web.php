<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;


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
Route::post('/set-dollar', [StoreController::class, 'set_dollar_rate'])->name('set_dollar_rate');

//set delevery rate 
Route::post('/set-delivery-rate-per-kilometer', function (Request $req) {
  DB::table('delivery_rate_per_km')
    ->update(['rate' => $req->rate]);

  return redirect()->back();
})->name('set_delivery_rate');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/manage-stock', [App\Http\Controllers\HomeController::class, 'manage_stock'])->name('manage-stock');






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




#messages
Route::get('/messages', [MessagesController::class, 'index'])->name('messages');
Route::get('/create-general-message', [MessagesController::class, 'create_general_message'])->name('create_general_message');
Route::get('/create-staff-message', [MessagesController::class, 'create_staff_message'])->name('create_staff_message');
Route::get('/create-customer-message', [MessagesController::class, 'create_customer_message'])->name('create_customer_message');





Route::get('/make-sales', [App\Http\Controllers\HomeController::class, 'make_sales'])->name('make-sales');
Route::post('/poscheckout', [App\Http\Controllers\HomeController::class, 'poscheckout'])->name('poscheckout');

Route::post('/posaddtocart', [App\Http\Controllers\HomeController::class, 'posaddtocart'])->name('posaddtocart');

Route::post('/getCurentSales', [App\Http\Controllers\HomeController::class, 'getCurentSales'])->name('getCurentSales');

Route::post('/load_sub_categories', [App\Http\Controllers\HomeController::class, 'load_sub_categories'])->name('load_sub_categories');

Route::get('/sales-history', [App\Http\Controllers\HomeController::class, 'sales_history'])->name('sales_history');
Route::get('/view_stock', [App\Http\Controllers\HomeController::class, 'view_stock'])->name('view_stock');

Route::get('/getTotalSales', [App\Http\Controllers\HomeController::class, 'getTotalSales'])->name('getTotalSales');

Route::get('/print', [App\Http\Controllers\HomeController::class, 'print'])->name('print');

Route::get('/sales-output', [App\Http\Controllers\HomeController::class, 'sales_output'])->name('sales-output');
