<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function errorView($msg){
        return view('error', ['msg'=>$msg]);
    }
}
