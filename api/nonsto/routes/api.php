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

Route::group(['middleware' => ['cors']], function () {
    // Route::options("/hoge", "HomeController@hoge");
    // Route::get("/hoge", "HomeController@hoge");
    // or
    Route::match(["post", "options"], "/hoge", "HomeController@hoge");
    Route::match(['post', 'options'], '/login', 'Api\V1\Auth\LoginController@login');
});
