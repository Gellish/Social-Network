<?php

use Illuminate\Http\Request;
use App\Model\user\user;
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

Route::group(['namespace' => 'User'],function() {
    Route::middleware('auth:api')->get('/users', 'Users\UserController@AuthRouteAPI');
});


//// File: routes/api.php
//Route::post('authenticate','ChatkitController@authenticate');
//Route::get('users', 'ChatkitController@getUsers');
//Route::post('message','ChatkitController@sendMessage');