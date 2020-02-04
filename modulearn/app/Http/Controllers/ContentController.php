<?php

namespace Modulearn\Http\Controllers;

use Modulearn\Content;
use Modulearn\Dependency;
use Modulearn\Favorite;

use Illuminate\Http\Request;
use Session;
use Log;
use Auth;
use Markdown;

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
        Log::info("STORE");
        Log::info($request);
        $user = Session::get('user');

        if(!isset($user)){
            return redirect('error/I hear violins...');
        }

        $content = $request['input-markdown'];
        $title = $request['title'];
        $userid = $user['id'];
        $difficulty = $request['difficulty'];

        //TODO validate for nulls

        $deps = array();

        unset($key);
        unset($value);

        $entry = new Content;
        $entry->title = $title;
        $entry->content = $content;
        $entry->owner_id = $userid;
        $entry->dependents = 0;
        $entry->difficulty= $difficulty;

        //Log::info($entry);

        $entry->save();

        //if entry saved, create dependency joints
             //create dependency joints
        foreach ($_REQUEST as $key => $value){
            if (substr($key, 0, 4) === 'dep-'){
                //array_push($deps, $value);
                $dep = new Dependency;
                $dep->dependency_id = $value;
                $dep->dependent_id = $entry->id;
                $dep->save();
            }
        }

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
        $user = Session::get('user');

        if (!isset($user)){
            return view('errors/404'); 
        }

        $content = $this->getTutorial($id);

        if(!isset($content)){
            return view('errors/404');
        }

        return view('topics/edit')
            ->with(['user'=>$user, 'content' => $content, 'alt_action' => 'PUT']);
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
        $user = Session::get('user');

        //Log::info($id);
        //Log::info($user->id);

        if (!isset($user)){
            return view('errors/404');
        }
        
        $tutorial = Content::where([
            ['id',$id],
            ['owner_id', $user->id]
            ])->first();

        if (!isset($tutorial)){
            return view('errors/404');
        }
        
        $content = $request['input-markdown'];

        foreach ($_REQUEST as $key => $value){
            if (substr($key, 0, 4) === 'dep-'){
                Log::info($value);
            }
        }

        Log::info($request);
        Log::info($id);

        //update data and save
        $content = $request['input-markdown'];
        $title = $request['title'];
        $difficulty = $request['difficulty'];

        $tutorial->content = $content;
        $tutorial->title = $title;
        $tutorial->difficulty= $difficulty;

        $tutorial->save();

        return redirect()->back();
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

    /* API - Not intended for the API Route middleware*/

    

    public function toggleFavorite($tutorialId){

        $user = Session::get('user');

        if(!isset($user)){
            return redirect('error/No active user session');
        }

        $fav = self::getFavorited($tutorialId);

        if(!isset($fav)){
            $entry = new Favorite();
            $entry->userId = $user->id;
            $entry->tutorialId = $tutorialId;
            $entry->save();
        } else {
            $fav->delete();
        }
    }

    public function isFavorited($tutorialId){
        $fav = self::getFavorited($tutorialId);
        return var_export(isset($fav));
    }

    public function getFavorited($tutorialId){
        $user = Session::get('user');

        if(!isset($user)){
            return redirect('error/No active user session');
        }

        $fav = Favorite::where('userId', $user->id)
            ->where('tutorialId', $tutorialId)->first();
        
        return $fav;
    }

    public function getFavorites(){
        $user = Session::get('user');

        if(!isset($user)){
            return redirect('error/No active user session');
        }

        //TODO implement
    }

    public function setTags($tutorialId, $tagString){

    }

    /* For API middleware */
    public function getTutorial($tutorialId, $raw_md=false){

        $tutorial = Content::where('id', $tutorialId)->first();
        $dependencies = Dependency::where('dependent_id', $tutorialId)->get();

        if (!isset($tutorial)){
            return abort(404);
        }

        $tutorial->dependencies = $dependencies;

        if(isset($raw_md) && $raw_md == false){
            $tutorial->content = Markdown::parse($tutorial->content);
        }

        return $tutorial;
    }

    public function getTags($tutorialId){
        $tutorial = Content::where('id', $tutorialId);

        if(!isset($tutorial)){
            redirect('error/No such content');
        }

        //TODO implement   
    }
}
