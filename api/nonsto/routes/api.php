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

    // HTTPリクエストのoptionsでcorsのpreflightをしています。200が返却されるようにしないとcorsエラーになります
    Route::options("/login", function() {
        return response()->json();
    });
    Route::post('/login', 'Api\V1\Auth\LoginController@login');
});
