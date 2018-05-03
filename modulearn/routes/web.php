<?php

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

Route::resources([
    'users' => 'UserController'
]);

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function(){
    return view('login');
});

Route::post('login', 'UserController@loginAs');
Route::post('users', 'UserController@store');

Route::get('/topics', function(){
    return view('topics');
});

Route::get('/about', function(){
    return view('about');
});
