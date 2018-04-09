<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

use App\Topic;
use App\Forum;
use App\Trend;
use App\Tag;

class TopicController extends Controller {
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(){
        $topics = (new Topic)->latest()->paginate(10);
        return view('topic.list', [ 'topics' => $topics ]);
    }

    public function show(Topic $topic){
        return view('topic.one', compact('topic'));
//        return view('comment.one', compact('topic'));
    }

    public function create(){
        $categories = Forum::all();
        $trends = Trend::all();
        return view(
            'topic.create', compact('categories', 'trends')
        );
    }

    // ToDo: file:///media/deciano/Orcses/JAVA%20WEB%20DOS/WEB/myWEBSITES/laravel/Laravel54/laravel.com/docs/5.4/validation.html#form-request-validation
    public function store(Request $request){
        $this->validate($request, $rules = Topic::rules());

        $allowed = $request->only( array_keys( $rules ) );
        $dropped = $request->except(['share_fb', 'share_tw', 'share_gp']);
        $fields = array_intersect_key( $allowed, $dropped );

        $appended = [
            'title_slug' => Str::slug( $request['title'] ),
            'share' => [
                'fb' => $request['share_fb'], 'tw' => $request['share_tw'], 'gp' => $request['share_gp']
            ]
        ];

        $topic = array_merge( $fields, $appended );

        auth()->user()->createTopic(
            new Topic( $topic )
        );

        session()->flash('message', "Your topic has been published");

        return redirect()->route('topics');
    }

    public function edit(Topic $topic){
        $categories = Forum::all();
        $trends = Trend::all();
        return view(
            'topic.edit', compact('categories', 'trends', 'topic')
        );
    }

    public function put(Request $request, Topic $topic){
        $this->validate($request, $rules = Topic::rules('put'));

        $allowed = $request->only( array_keys( $rules ) );
        $dropped = $request->except(['share_fb', 'share_tw', 'share_gp']);
        $fields = array_intersect_key( $allowed, $dropped );

        $appended = [
            'share' => [
                'fb' => $request['share_fb'], 'tw' => $request['share_tw'], 'gp' => $request['share_gp']
            ]
        ];

        $fields = array_merge( $fields, $appended );

        $topic->updateTopic( $fields );

        session()->flash('message', "Topic has been updated");

        return redirect()->back();

    }

}
