<?php

use Illuminate\Http\Request;

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

    // Route::middleware('auth:api')->get('/user', function (Request $request) {
    //     return $request->user();
    // });
Route::group(['namespace' => 'Api'], function() {
    Route::post('login', ['uses' => 'AuthController@login', 'as' => 'api.auth.login']);
    Route::post('register', ['uses' => 'AuthController@register', 'as' => 'api.users.register']);
    Route::post('password/email', ['uses' => 'ForgotPasswordController@sendResetLinkEmail', 'as'  =>  'api.users.forgotpassword']);
    Route::get('password/reset/{token}', ['uses' => 'ForgotPasswordController@sendWeb', 'as' =>  'api.users.reset']);
    Route::post('logingoogle',['uses' =>  'AuthController@loginGoogle']);
    Route::post('loginfacebook', ['uses' =>  'AuthController@loginFacebook']);

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('getmember',['uses'=> 'AuthController@index', 'as' => 'api.auth.getmember']);
    });
});