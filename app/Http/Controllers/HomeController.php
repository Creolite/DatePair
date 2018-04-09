<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct(){
        $this->middleware('auth')->except('index');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $topics = (new Topic)->latest()
            ->where('featured', '1')
            ->paginate(10);
        return view('home', [ 'topics' => $topics ]);
    }
}
