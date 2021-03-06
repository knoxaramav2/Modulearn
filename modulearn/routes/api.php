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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/getList', "UserController@getList");

Route::get('/topics/get_tutorial/{id}/{raw_md?}', "ContentController@getTutorial");
Route::get('/topics/get_tags/{id}',"ContentController@getTags");
