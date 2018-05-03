<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Session;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
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
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users,email'
        );

        return $request;
    }

    public function loginView(){
        return view('login');
    }

    public function loginAs(){
        Session::flush();

        Log::info(database_path('database.sqlite'));
        
        $validate_rules = array(
            'name' => 'required',
            'password' => 'required'
        );

        $messages = array(
            'required' => 'Please fill in the :attribute field'
        );

        $validator = Validator::make(Input::all(), $validate_rules, $messages);

        if ($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = User::where('name', '=', Input::get('name'))->first();

        if (!isset($user)){
            $validator->getMessageBag()->add('Username', 'No such user');          
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        if (!Hash::check(Input::get('password'), $user->password)){
            $validator->getMessageBag()->add('Password', 'Invalid password');          
            return Redirect::back()->withErrors($validator)->withInput();        
        }

        Session::put('username', $user->name);

        return redirect()->intended('/');

        return Redirect('/');
    }

}