<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

use Auth;
use App\Topic;
use App\Forums;
use App\Trends;
use App\Tags;

class TopicController extends Controller {
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){

    }

    public function show(Topic $topic){
        return view('topic.one', compact('topic'));
//        return view('comment.one', compact('topic'));
    }

    public function create(Request $request){
	 	$user_id = Auth::user()->id;
	 	$this->validateTopic($request);
	 	
	 	$topic = new Topic();
	 	$topic->name = $request->input('name');
	 	$topic->desc = $request->input('desc');
	 	$topic->forums_id = $request->input('forums');
	 	$topic->trends_id = $request->input('tags');
	 	$topic->user_id = $user_id;
        $topic->name_slug = Str::slug($request->input('name'));

    	if($topic->save()){
    		return response()->json(['message'=>'Topic created']);
    	}else{
    		return response()->json(['message'=>'Topic not created']);
    	}
    }


    public function getTopic(){
    	$user_id = Auth::user()->id;
    	$topic = Topic::where('user_id',$user_id)
    						->orderBy('id', 'desc')
    						->paginate(3);
    	 return view('pages.new_topic')->with('topic', $topic);
    	
    }

    

    protected function validateTopic(Request $request){
    	$this->validate($request,[
    		'name' => 'required|string|max:191',
    		'desc' => 'required|string|max:3000'
    	]);
    }



    


   
}
