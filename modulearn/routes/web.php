<?php

use App\User;


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
    $user = Session::get('user');//User::where('name', '=', "Test User")->first();
    return View::make('home', ['user'=>$user]);
});


//User login/logout
Route::post('login', 'UserController@loginAs');
Route::post('users', 'UserController@store');

Route::get('logout', 'UserController@logout');
Route::get('login', 'UserController@loginView');

Route::get('account', 'UserController@accountView');

//Topics
Route::get('/topics', function(){
    return view('topics');
});

Route::get('/about', function(){
    return view('about');
});

//Errors
Route::get('/error/{msg}', 'ErrorController@errorView');


//Admin/Manage
Route::get('/manage', 'ManageController@manageView');