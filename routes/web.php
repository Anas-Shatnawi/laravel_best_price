<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

use App\User;
use \App\Models\Role;
use \App\Models\Permission;
use App\Http\Middleware\isCartEmpty;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
Route::get('/home', 'WelcomeController@Home');

Route::get('/new-products', 'WelcomeController@NewProducts');
Route::get('/best-seller', 'WelcomeController@BestSeller');
Route::get('/top-rated', 'WelcomeController@TopRated');

Route::get('/','WelcomeController@Welcome');

Route::get('/categories', 'Categories@index');
$router->get('/categories/{id}',[
    'uses'=>'Categories@Category',
    'as'=>'switch'
]);

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

$router->get('/productDetails/{id}',[
    'uses' => 'Details@index',
    'as'   => 'switch'
]);

// Route::post('/add_cart', 'Details@addToCart');
Route::get('/add-to-cart/{id}',[
    'uses' =>'Details@getAddToCart',
    'as'=>'add.to.cart'
]);

Route::get('/cart',[
    'uses' =>'Cart@getCart',
    'as'=>'cart'
]);

Route::post('/add-to-wish-list', 'Details@AddToWishList');

Route::get('/wish-list',[
    'uses' =>'WishList@getWishList',
    'as'=>'wish-list'
]);
Route::get('/about-us',[
    'uses' =>'AboutUs@getAboutUS',
    'as'=>'about-us'
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/settings','SettingsController@getSettings');
    Route::post('/update-settings/{id}', 'SettingsController@postSettings');
    
    Route::get('/orders','OrdersController@index');

});

Route::middleware(['auth','cart'])->group(function () {
    Route::get('/checkout/{id}','CheckoutController@index');
    Route::post('/checkout','CheckoutController@placeOrder')->name('placeOrder');
});

Route::DELETE('/delete-from-cart/{id}','Cart@deleteItem');
Route::DELETE('/delete-from-wish-list/{id}','WishList@deleteItem');



Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function(){
    Route::get('/', 'AdminController@index')->name('home');
    
    Route::get('/products-table', 'AdminController@index')->name('home');
    Route::post('/add-product', 'AdminController@postProduct')->name('add-product');
    
    Route::get('/add-product', 'AdminController@getProduct');
    
    Route::get('/edit-product/{id}','AdminController@getEditProduct');
    Route::post('/update-product','AdminController@postEditProduct')->name('update-product');
    
    Route::get('/categories-table','AdminController@getCategory');
    
    Route::get('/add-category','AdminController@getAddCategory');
    Route::post('/add-category','AdminController@postAddCategory');
    
    Route::get('/edit-category/{id}','AdminController@getEditCategory');
    Route::post('/update-category','AdminController@postEditCategory')->name('update-category');
    
    Route::get('/coupons-table','AdminController@getCoupon');
    
    Route::get('/add-coupon','AdminController@getAddCoupon');
    Route::post('/add-coupon','AdminController@postAddCoupon');

    Route::get('/edit-coupon/{id}','AdminController@getEditCoupon');
    Route::post('/edit-coupon','AdminController@postEditCoupon')->name('update-coupon');
    
    Route::get('/locations-table','AdminController@getLocation');
   
    Route::get('/add-location','AdminController@getAddLocation');
    Route::post('/add-location','AdminController@postAddLocation');

    Route::get('/edit-location/{id}','AdminController@getEditLocation');
    Route::post('/edit-location','AdminController@postEditLocation')->name('update-location');


    Route::get('/users-table','AdminController@getUsers')->name('users-table');
    Route::get('/edit-user/{id}','AdminController@getEditUser');
    Route::post('/edit-user','AdminController@postEditUser')->name('update-user');
    
    Route::get('/users-orders','AdminController@getUsersOrders');

});
    Route::middleware('role:superadministrator|administrator')->group(function(){ 
        Route::DELETE('/delete-product/{id}','AdminController@deleteProduct');
        Route::DELETE('/delete-coupon/{id}','AdminController@deleteCoupon');
        Route::DELETE('/delete-category/{id}','AdminController@deleteCategory');
        Route::DELETE('/delete-location/{id}','AdminController@deleteLocation');
        Route::DELETE('/delete-user/{id}','AdminController@deleteUser');
    }
);