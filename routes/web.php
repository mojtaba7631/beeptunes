<?php

use App\Http\Controllers\admin\adminDashboardController;
use App\Http\Controllers\admin\adminPostCategories;
use App\Http\Controllers\admin\adminPostController;
use App\Http\Controllers\admin\adminUserController;
use App\Http\Controllers\admin\captchaController;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\about_us\adminAboutController;
use App\Http\Controllers\admin\contact_us\adminContactController;
use App\Http\Controllers\admin\messages\adminMessageController;
use App\Http\Controllers\admin\tests\adminTestController;
use App\Http\Controllers\admin\events\adminEventController;
use App\Http\Controllers\admin\five_factors\adminFiveFactorController;
use App\Http\Controllers\admin\albums\adminAlbumController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\site\home\homeController;
use App\Http\Controllers\site\posts\postController;
use App\Http\Controllers\site\tests\siteTestController;
use App\Http\Controllers\site\about_us\siteAboutController;
use App\Http\Controllers\site\contact_us\siteContactController;
use App\Http\Controllers\site\consultant_register\siteConsultantRegisterController;
use App\Http\Controllers\site\events\siteEventController;
use App\Http\Controllers\site\albums\siteAlbumController;
use App\Http\Controllers\site\cart\siteCartController;
use App\Http\Controllers\site\auth\siteAuthController;

use App\Http\Controllers\user\userAddressController;


use App\Http\Controllers\add_to_cart\siteAddToCartController;


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


Route::get('/', [homeController::class, 'index'])->name('home');

Route::get('get-captcha/{c}', [captchaController::class, 'index'])->name('get_captcha');

//Admin
Route::namespace('App\Http\Controllers\admin')
    ->middleware('adminAuth')
    ->name('admin.')
    ->prefix('/panel')
    ->group(function () {
        //dashboard
        Route::get('dashboard', [adminDashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', [adminDashboardController::class, 'profile'])->name('profile');
        Route::post('profile/update', [adminDashboardController::class, 'profile_update'])->name('profile_update');
        Route::post('change-pass', [adminDashboardController::class, 'changePass'])->name('changePass');

        //users
        Route::get('users', [adminUserController::class, 'index'])->name('users');
        Route::post('users/search', [adminUserController::class, 'search'])->name('users.search');
        Route::get('users/edit/{user_id}', [adminUserController::class, 'edit'])->name('users.edit');
        Route::post('users/update/{user_id}', [adminUserController::class, 'update'])->name('users.update');
        Route::post('users/delete', [adminUserController::class, 'delete'])->name('users.delete');

        //post categories
        Route::resource('post_category', adminPostCategories::class);

        //posts
        Route::resource('posts', adminPostController::class);

        //about us
        Route::get('about_us_panel', [adminAboutController::class, 'index'])->name('about_us_panel');
        Route::post('about_us_update/{id}', [adminAboutController::class, 'update'])->name('about_us_update');

        //contact us
        Route::get('contact_us_panel', [adminContactController::class, 'index'])->name('contact_us_panel');
        Route::post('contact_us_update/{id}', [adminContactController::class, 'update'])->name('contact_us_update');

        //messages
        Route::get('message_panel', [adminMessageController::class, 'index'])->name('message_panel');

        //tests
        Route::get('tests', [adminTestController::class, 'index'])->name('test_panel');
        Route::get('tests_create', [adminTestController::class, 'create'])->name('test_create_panel');
        Route::post('tests_store', [adminTestController::class, 'store'])->name('test_store_panel');
        Route::get('tests_edit/{test_id}', [adminTestController::class, 'edit'])->name('test_edit_panel');
        Route::post('tests_update/{test_id}', [adminTestController::class, 'update'])->name('test_update_panel');
        Route::post('tests_delete/{test_id}', [adminTestController::class, 'destroy'])->name('test_delete_panel');

        //events
        Route::get('events_panel', [adminEventController::class, 'index'])->name('events_panel');
        Route::get('events_create_panel', [adminEventController::class, 'create'])->name('events_create_panel');
        Route::post('events_store_panel', [adminEventController::class, 'store'])->name('events_store_panel');
        Route::get('events_edit_panel/{event_id}', [adminEventController::class, 'edit'])->name('events_edit_panel');
        Route::get('events_main_panel/{event_id}', [adminEventController::class, 'main'])->name('events_main_panel');
        Route::post('events_update_panel/{event_id}', [adminEventController::class, 'update'])->name('events_update_panel');
        Route::post('events_delete_panel/{event_id}', [adminEventController::class, 'delete'])->name('events_delete_panel');


        //five_factors
        Route::get('five_factors', [adminFiveFactorController::class, 'index'])->name('five_factors');
        Route::post('five_factors_store_panel', [adminFiveFactorController::class, 'store'])->name('five_factors_store_panel');
        Route::post('five_factors_update_panel/{five_factors_id}', [adminFiveFactorController::class, 'update'])->name('five_factors_update_panel');
        Route::post('five_factors_delete_panel/{five_factors_id}', [adminFiveFactorController::class, 'delete'])->name('five_factors_delete_panel');

        //albums
        Route::get('album_panel', [adminAlbumController::class, 'index'])->name('album_panel');
        Route::get('album_create_panel', [adminAlbumController::class, 'create'])->name('album_create_panel');
        Route::post('album_store_panel', [adminAlbumController::class, 'store'])->name('album_store_panel');
        Route::get('album_edit_panel/{album_id}', [adminAlbumController::class, 'edit'])->name('album_edit_panel');
        Route::post('album_update_panel/{album_id}', [adminAlbumController::class, 'update'])->name('album_update_panel');
        Route::post('album_destroy_panel/{album_id}', [adminAlbumController::class, 'destroy'])->name('album_destroy_panel');
        Route::get('cat_album_panel', [adminAlbumController::class, 'cat_album'])->name('cat_album_panel');
        Route::post('cat_album_store_panel', [adminAlbumController::class, 'cat_album_store'])->name('cat_album_store_panel');
        Route::post('cat_album_update_panel/{cat_album_id}', [adminAlbumController::class, 'cat_album_update'])->name('cat_album_update_panel');
        Route::post('cat_album_delete_panel/{cat_album_id}', [adminAlbumController::class, 'delete'])->name('cat_album_delete_panel');


    });


// *************************  user **********************************

Route::namespace('App\Http\Controllers\user')
    ->middleware('userAuth')
    ->name('user.')
    ->prefix('/user-panel')
    ->group(function (){
    //dashboard
        Route::get('dashboard', [adminDashboardController::class, 'index'])->name('dashboard');

        //address
        Route::get('address',[userAddressController::class,'index'])->name('address');
        Route::post('address_store',[userAddressController::class,'store'])->name('address_store');
    });

// *************************  user **********************************


//  *************  site ***************
Route::post('event_register', [siteEventController::class, 'event_register'])->name('event_register');
Route::get('after_payment/{order_id}', [siteEventController::class, 'after_payment'])->name('after_payment');


//  *************  posts ***************

Route::get('blog', [postController::class, 'index'])->name('posts_page');
Route::get('blog/{post_nickname}', [postController::class, 'post_detail'])->name('post_detail');


//  *************  test ***************

Route::get('tests_page', [siteTestController::class, 'index'])->name('tests_page');
Route::get('test_detail/{test_id}', [siteTestController::class, 'test_detail'])->name('test_detail');
Route::get('five_factor_test/{test_id}', [siteTestController::class, 'five_factor_test'])->name('five_factor_test');
Route::post('test_user_register', [siteTestController::class, 'test_user_register'])->name('test_user_register');
Route::post('submitFiveFactorTest', [siteTestController::class, 'submitFiveFactorTest'])->name('submitFiveFactorTest');

//  *************  posts ***************

//  *************  about us ***************

Route::get('about_us', [siteAboutController::class, 'index'])->name('about_us');

//  *************  about us ***************


//  *************  contact us ***************

Route::get('contact_us', [siteContactController::class, 'index'])->name('contact_us');

//  *************  contact us ***************


//  *************  contact us ***************

Route::get('messages', [adminMessageController::class, 'index'])->name('messages');
Route::post('messages_store', [adminMessageController::class, 'store'])->name('messages_store');

//  *************  contact us ***************


//  *************  consultant register ***************

Route::get('user_register', [siteConsultantRegisterController::class, 'index'])->name('user_register');
Route::post('user_register_store', [siteConsultantRegisterController::class, 'store'])->name('user_register_store');

//  *************  consultant register ***************


//  *************  albums ***************

Route::get('albums', [siteAlbumController::class, 'index'])->name('albums');
Route::get('album_detail/{album_id}', [siteAlbumController::class, 'album_detail'])->name('album_detail');

//  *************  albums ***************


// ******************** cart ********************************

Route::get('cart', [siteCartController::class, 'index'])->name('cart');
Route::middleware('userAuth')->get('checkout', [siteCartController::class, 'checkout'])->name('checkout');

// ******************** cart ********************************


// ******************** site login ********************************

Route::get('login', [siteAuthController::class, 'login'])->name('user.login');
Route::get('doUserLogin', [siteAuthController::class, 'doUserLogin'])->name('doUserLogin');

// ******************** site login ********************************


//  *************  site ***************

//register for user
Route::post('doRegister',[siteAuthController::class,'doRegister'])->name('site.doRegister');

//login & logout for admin
Route::middleware('loginMiddleware')
    ->get('/admin-login', [loginController::class, 'index'])
    ->name('login.view');

Route::middleware('loginMiddleware')
    ->post('/login/do', [loginController::class, 'do_login'])
    ->name('login.do');


//logout
Route::post('/logout', function () {
    auth()->logout();
    toast()->success('', 'با موفقیت خارج شدید')->autoClose(7500);
    return redirect()->route('home');
})->name('logout');
