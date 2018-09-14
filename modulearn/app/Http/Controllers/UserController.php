<?php

namespace Modulearn\Http\Controllers;

use Modulearn\User;

use Illuminate\Http\Request;
use Session;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Redirect;
use Hash;
use Log;
use Mail;

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

        Log::info($limit);
        Log::info($offset);

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

        $usersPage = User::paginate($limit);

        return $usersPage;
    }
}