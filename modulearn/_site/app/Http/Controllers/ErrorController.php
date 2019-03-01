<?php

namespace Modulearn\Http\Controllers;
use Session;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function errorView($msg){
        return view('error', ['msg'=>$msg, 'user'=>Session::get('user')]);
    }
}
