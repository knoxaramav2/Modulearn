<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;

class ManageController extends Controller
{
    public function manageView(){

        $user = Session::get('user');

        if($user == "" || !$user->isAdmin){
            return redirect('error/Permission denied');
        }

        return view('manage')->with(['user'=>$user]);
    }
}
