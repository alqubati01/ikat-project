<?php

namespace App\Http\Controllers;

use App\notification;
use App\Post;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
//        $post=Post::where('user_id',Auth::id())->get();

        $post=Post::
        where('user_id',Auth::id())->
        orwhereIn('user_id',function($query ){
            $query->select('captain_id')->from('teams')
                ->where('member_id',Auth::id());
        })->get();
        $post =  $post->reverse();
//        return $post;
//        Team::where('member_id',Auth::id())->update(['notification' => 0]);
//        first()->notification=0;

//        notification::where('user_id',Auth::id())->where('type',1)->update(['state' => 0]);

        $arr =array('post'=>$post);
        return view('post.index',$arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $post=new Post();
        $post->text=$request->input('post');
        $post->user_id=Auth::id();
        $post->date=Carbon::now();
//        return Carbon::now()->toDateTimeString();
//        Carbon\Carbon::now()
        $post->save();
//        Team::where('captain_id',Auth::id())->update(['notification' => DB::raw('notification+1')]);

        $team=Team::where('captain_id',Auth::id())->get();

        foreach ($team as $tm){
            if($tm->user->id !=Auth::user()->id) {
                $notic = new notification();
                $notic->user_id = $tm->user->id;
                $notic->message = Auth::user()->name . " Added new post  ";
                $notic->url = "http://127.0.0.1:8000/Posts#" . $post->id;
                $notic->type=1;
                $notic->save();
            }
        }

        return back()->with('status', 'Post crearted successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
