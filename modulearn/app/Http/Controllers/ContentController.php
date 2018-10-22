<?php

namespace Modulearn\Http\Controllers;

use Modulearn\Content;
use Modulearn\Dependency;

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

        $entries = Content::all();

        return view('topics/topics')->with(array('user'=>$user, 'entries'=>$entries));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Session::get('user');

        if (!isset($user)){
            return redirect('/login?redirect=topic/create');
        }

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

        unset($key);
        unset($value);

        $entry = new Content;
        $entry->title = $title;
        $entry->content = $content;
        $entry->owner_id = $userid;
        $entry->dependents = 0;//= count($deps);

        Log::info($entry);

        $entry->save();

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
        $content = Content::where('id', $id)->first();
        return view('topics/tutorial')->with(['content' => $content]);
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
