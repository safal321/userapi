<?php

use Illuminate\Http\Request;
use App\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('user-register','Api\UserController@register');
Route::post('user-login', 'Api\UserController@login');

Route::middleware('ApiToken')->group(function () {
    //here you can register route

    Route::get('api-check', function (Request $request) {
        return User::where('access_token', $request->header('Authorization'))->first();
    });

});