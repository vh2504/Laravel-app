<?php

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

// Auth::routes();
Route::namespace('User')->group(function () {
    Route::get('/login', 'AuthController@showLoginForm')->name('get-login');
    Route::post('/login', 'AuthController@login')->name('login');

    Route::get('/register', 'AuthController@register')->name('get-register');
    Route::post('/register', 'AuthController@postRegister')->name('register');
    Route::post('/register/{step}', 'AuthController@postRegisterStep')->name('register-step');
    Route::get('get-prefectures', 'AuthController@getPrefectures')->name('register-get-prefecture');
    Route::get('suggest-cities', 'AuthController@suggestCities')->name('register-get-city');

    Route::get('reset-password', 'ResetPasswordController@resetPassword')->name('get-reset-password');
    Route::post('reset-password', 'ResetPasswordController@sendMailResetPassword')->name('reset-password');
    Route::get('reset-password/success', 'ResetPasswordController@resetPasswordSuccess')->name('reset-password-success');
    Route::get('reset-password/{token}', 'ResetPasswordController@formResetPassword')->name('form-reset-password');
    Route::post('reset-password/{token}', 'ResetPasswordController@reset')->name('confirm-reset-password');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'TopController@index');
        Route::get('/top', 'TopController@index')->name('top');
        Route::get('/logout', 'AuthController@logout')->name('logout');
    });

    // Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});



