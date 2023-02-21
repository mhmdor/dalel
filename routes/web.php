<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SubCityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/owner', [LoginController::class, 'showownerLoginForm']);
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm']);
Route::get('/register/owner', [RegisterController::class, 'showownerRegisterForm']);
Route::post('/login/admin', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('/login/owner', [LoginController::class, 'ownerLogin']);
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);
Route::post('/register/owner', [RegisterController::class, 'createowner']);
Route::get('/logout/admin', [LoginController::class, 'logout'])->name('admin.logout');




Route::get('/premium', [HomeController::class, 'premium'])->name('premium');

Route::any('/searchplace', [PlaceController::class, 'searchplace'])->name('searchplace');

Route::any('/searchcoupon', [CouponController::class, 'searchcoupon'])->name('searchcoupon');

Route::post('/searchdiscountget', [DiscountController::class, 'searchdiscountpost'])->name('searchdiscountpost');

Route::get('/searchdiscount', [DiscountController::class, 'searchdiscountget'])->name('searchdiscount');

Route::get('/getplace/{id}', [PlaceController::class, 'getplace'])->name('getplace');

Route::get('/discountUser', [DiscountController::class, 'discountUser'])->name('discountUser');

Route::get('/usercopoun/{id}', [CouponController::class, 'usercopoun'])->name('usercopoun');

Route::get('/userdiscount/{id}', [DiscountController::class, 'userdiscount'])->name('userdiscount');



Route::get('City/get', [CityController::class, 'getCity'])->name('getCity');

// Route::post('Place/search', [PlaceController::class, 'search'])->name('searchPlace');

Route::get("/get-city/{id}", [PlaceController::class, "getcityById"]);

Route::get("/get-place/{id}", [PlaceController::class, "getplaceById"]);

Route::get("/get-coupon/{id}", [CouponController::class, "getcouponById"]);



Route::group([ 'middleware' => ['auth:admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('Dashboard', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('createcoupon', [CouponController::class, 'create'])->name('createcoupon');

    Route::post('storecoupon', [CouponController::class, 'store'])->name('storecoupon');

    Route::get('creatediscount', [DiscountController::class, 'create'])->name('creatediscount');

    Route::post('storediscount', [DiscountController::class, 'store'])->name('storediscount');

    Route::get('getcoupon', [CouponController::class, 'index'])->name('getcoupon');

    Route::get('getdiscount', [DiscountController::class, 'index'])->name('getdiscount');

    Route::get('/alluserdiscount/{id}', [DiscountController::class, 'alluser'])->name('alluser.discount');


    Route::get('/alluser/{id}', [CouponController::class, 'alluser'])->name('alluser');

    Route::get('/winnerusers/{id}', [CouponController::class, 'winnerusers'])->name('winnerusers');

    Route::get('/getwinner/{id}', [CouponController::class, 'getwinner'])->name('getwinner');

    Route::get('/getgift/{id}', [CouponController::class, 'getgift'])->name('getgift');

    Route::any('Category/create', [CategoryController::class, 'createCategory'])->name('createCategory');

    Route::any('Place/create', [PlaceController::class, 'createPlace'])->name('createPlace');

    Route::get('/finishcopoun', [CouponController::class, 'finishcopoun'])->name('finishcopoun');

    Route::any('City/create', [CityController::class, 'createCity'])->name('createCity');

    Route::any('SubCity/create', [SubCityController::class, 'createSubCity'])->name('createSubCity');

    Route::any('Slide/create', [SlideController::class, 'createSlide'])->name('createSlide');

    Route::get('Slide/delete/{id}', [SlideController::class, 'delete'])->name('deleteSlide');
});



Route::group([ 'middleware' => ['auth:owner'], 'prefix' => 'owner', 'namespace' => 'Owner'], function () {

    Route::get('Dashboard', [HomeController::class, 'ownerHome'])->name('owner.home');

    Route::post('confirmCode', [DiscountController::class, 'confirmCode'])->name('confirmCode');

    Route::post('accessCode', [DiscountController::class, 'accessCode'])->name('accessCode');



});

