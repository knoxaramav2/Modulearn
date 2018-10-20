<?php

namespace Modulearn\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;
use Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Session::get('user');
        return view('topics/topics')->with(['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Session::get('user');
        return view('topics/create')
            ->with(['user'=>$user])
            ->withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request);
        $user = Session::get('user');

        if(!isset($user)){
            return redirect('error/I hear violins...');
        }

        $content = $request['input-markdown'];
        $title = $request['title'];
        $userid = $user['id'];

        $deps = array();

        foreach ($_REQUEST as $key => $value){
            if (substr($key, 0, 4) === 'dep-'){
                array_push($deps, $value);
            }
        }

        Log::info($deps);

        unset($key);
        unset($value);

        //DB::insert('insert into content () values ()', );

        return view('topics/topics')->with(['user'=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
