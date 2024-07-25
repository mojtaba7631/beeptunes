<?php

use App\Http\Controllers\api\generalApiController;
use App\Http\Controllers\api\authApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers\api')
    ->name('api.')
    ->group(callback: function (){

        // General Api
        //  *************  add to cart ***************

        Route::post('add_to_cart',[generalApiController::class,'add_to_cart'])->name('add_to_cart');
        Route::post('remove_from_cart',[generalApiController::class,'remove_from_cart'])->name('remove_from_cart');

        //  *************  add to cart ***************

        // General Api

//        Auth Api
        //*********************** auth ******************************

        Route::post('send_register_confirm_code',[authApiController::class,'send_register_confirm_code'])->name('send_register_confirm_code');


        //*********************** auth ******************************

//        Auth Api

    });
