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
    // Route::options('hoge', function () {
    //     return response()->json('hoge', 200, [
    //         'Access-Control-Allow-Origin' => '*',
    //         'Access-Control-Allow-Headers' => 'Origin, X-Requested-With, Content-Type, Accept',
    //     ]);
    // });
    Route::post('/login', 'Api\V1\Auth\LoginController@login');
    Route::get(["get", "options"], "/hoge", "HomeController@hoge");
});

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function () {
    Route::get('/hoge', function () {
        return "hogehoeg";
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
