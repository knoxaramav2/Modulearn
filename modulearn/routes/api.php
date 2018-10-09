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

Route::resources([
    'content' => 'ContentController'
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/manage/terminal', function(){
    $user = Session::get('user');
    Log::info('TERM');
    Log::info($user);
    return View::make('/manage/terminal', ['user'=>$user]);
});

Route::get('/user/getList', "UserController@getList");

