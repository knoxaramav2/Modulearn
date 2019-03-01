<?php

use App\User;
use Modulearn\Content;

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

Route::resources([
    'topics' => 'ContentController'
]);

Route::get('/', function () {
    $user = Session::get('user');
    $latest = Content::orderBy('id', 'desc')->take(5)->get();
    return View::make('home', ['user'=>$user, 'submissions' => $latest]);
});

Route::get('/test', function(){
    Log::info(DB::select(DB::raw("select name from users")));
    return DB::select(DB::raw("select name from users"));
});


//User login/logout
Route::post('login', 'UserController@loginAs');
Route::post('users', 'UserController@store');

Route::get('logout', 'UserController@logout');
Route::get('login', 'UserController@loginView');

Route::get('account', 'UserController@accountView');

//Topics

//Errors
Route::get('/error/{msg}', 'ErrorController@errorView');

//Admin/Manage
Route::get('/manage', 'ManageController@manageView');
Route::get('/manage/users', 'ManageController@usersManage');
Route::get('/manage/terminal', 'ManageController@terminal');
Route::get('/manage/topics', 'ManageController@topicsManage');

//Content

//other
Route::get('/about', function(){
    $user = Session::get('user');
    return View::make('about', ['user'=>$user]);
});