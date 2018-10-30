<?php

namespace Modulearn\Http\Controllers;

use Modulearn\Content;
use Modulearn\Dependency;

use Illuminate\Http\Request;
use Session;
use Log;
use Auth;
use Markdown;

class Report
{
    public $title;
    public $deps;
    public $id;
    public $content;
    public $owner;

    public function __construct($t, $i, $d, $c, $o){
        $title = $t;
        $deps = $d;
        $id = $i;
        $content = $c;
        $owner = $o;
    }

    public function toString()
    {

    }
}

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
            ->with(['user'=>$user]);
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

        //TODO validate for nulls

        $deps = array();

        //create dependency joints
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
        $entry->dependents = 0;

        Log::info($entry);

        $entry->save();

        //TODO update dependency counter on select valid items, or remove dependency counters

        //DB::insert('insert into content () values ()', );

        return redirect('topics');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Session::get('user');
        $content = $this->getTutorial($id);

        if(!isset($content)){
            return view('errors/404');
        }

        Log::info($content);

        //return $content;

        return view('topics/tutorial')
            ->with(['user'=>$user, 'content' => $content]);
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

    /* API */

    public function getTutorial($id){

        $tutorial = Content::where('id', $id)->first();
        $dependencies = Dependency::where('dependent_id', $id)->get();

        $tutorial->dependencies = $dependencies;
        $tutorial->content = Markdown::parse($tutorial->content);

        return $tutorial;
    }
}
