<?php

namespace Modulearn\Http\Controllers;

use Modulearn\User;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Redirect;
use Hash;
use Log;
use Mail;
use DB;

class UserController extends Controller
{

    public function store(Request $request){
        
        Session:flush();

        $validate_rules = array(
            'name' => "required|unique:users",
            'password' => 'required',
            'email' => 'required|email|unique:users,email'
        );

        $messages = array(
            'required' => 'Please fill in the :attribute field'
        );

        $validator = Validator::make(Input::all(), $validate_rules, $messages);

        if ($validator->fails()){
            Session::flash('err_sec','err_signup');
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        return redirect('/');
    }

    public function loginView(){
        if(Session::has('user'))
            return redirect('/');

        return view('login');
    }

    public function loginAs(){
        Session::flush();
        
        $validate_rules = array(
            'name' => 'required',
            'password' => 'required'
        );

        $messages = array(
            'required' => 'Please fill in the :attribute field'
        );

        $validator = Validator::make(Input::all(), $validate_rules, $messages);

        if ($validator->fails()){
            Session::flash('err_sec','err_login');
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::where('name', '=', Input::get('name'))->first();

        if (!isset($user)){
            $validator->getMessageBag()->add('Username', 'No such user');          
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        if (!Hash::check(Input::get('password'), $user->password)){
            Session::flash('err_sec','err_login');
            $validator->getMessageBag()->add('Password', 'Invalid password');          
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();        
        }

        Session::put('user', $user);

        return redirect('/');
    }

    public function logout(){

        Session::flush();

        return redirect('/');
    }

    public function accountView(){

        $user = Session::get('user');

        if(!isset($user)){
            return redirect('error/No active user session');
        }

        return view('account', ['user'=>$user]);
    }

    public function getList(Request $request){

        $currentPage = 1;

        Log::info($request);

        $limit = $request->input('limit');
        $offset = $request->input('offset');
        $page = $request->input('page_no');

        if (!isset($limit)){
            $limit = 25;
        }

        if (!isset($offset)){
            $offset = 0;
        }

        if (!isset($page)){
            $page = 1;
        }

        $currentPage = $page;

        Paginator::currentPageResolver(function() use ($currentPage){
            return $currentPage;
        });

        $users = DB::select('select users.id, 
            users.name, users.email, users.isAdmin FROM users
            LIMIT 10 OFFSET '.$offset);//User::select('name', 'id', 'email', 'isAdmin');
        //$usersPage = $this->arrayPaginator($users, $request);
        Log::info($users);

        return $users;//$usersPage;
    }

    function arrayPaginator($array, $request){
        $page = request()->get('page', 1);//Input::get('page', 1);
        $limit = 5;//Input::get('limit', 1);
        $offset = ($page * $limit) - $limit;

        //Log::info(count($array));

        $slice = array_slice($array, $offset, $limit, true);

        $pager = new LengthAwarePaginator(
            $slice, 
            count($slice),
            $limit, Paginator::resolveCurrentPage(), 
            array('path' => Paginator::resolveCurrentPath()));
            //['path'=>$request->url(), 'query'=>$request->query()]);

        Log::info($page);
        return $pager;
    }
}