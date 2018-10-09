<?php

namespace Modulearn\Http\Controllers;

//include(app_path().'/Scripts/Auth.php');

use Illuminate\Http\Request;
use Session;
use Log;
use Auth;

class ManageController extends Controller
{
    public function manageView(){

        $user = Session::get('user');

        if($user == "" || !$user->isAdmin){
            return redirect('error/Permission denied');
        }

        return view('manage')->with(['user'=>$user]);
    }

    public function usersManage(){
        $user = Session::get('user');

        if(!isset($user) || !$user->isAdmin){
            return redirect('error/I hear violins...');
        }

        return view('manage/users')->with(['user'=>$user]);
    }

    public function terminal(){
        $user = Session::get('user');

        return view('manage/terminal')->with(['user'=>$user]);
    }

    public function terminalCommand(Request $request){    
        $user = Session::get('user');
        Log::info("TERM");
        Log::info(Session::all());
        if (!isset($user))
            return;

        $msg = $request->get('msg');
        Log::info("ROOT " . $msg);
    }

    public function topics(){

        return view('manage/topics');
    }
}
