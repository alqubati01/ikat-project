<?php

namespace App\Http\Controllers;

use App\Post;
use App\Post_comment;
use App\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)

    {
        //
        $post_comment=new Post_comment();
        $post_comment->text=$request->input('comment');
        $post_comment->date=Carbon::now();
        $post_comment->post_id=$id;
        $post_comment->user_id=Team::where('member_id',Auth::id())->where('captain_id',Post::find($id)->user_id)->first()->id;
//            return Team::where('member_id',Auth::id())->where('captain_id',Post::find($id)->user_id)->first()->id;
        $post_comment->save();

        return back()->with('status', 'comment is crearted successfully');


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
     * @param  \App\Post_comment  $post_comment
     * @return \Illuminate\Http\Response
     */
    public function show(Post_comment $post_comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post_comment  $post_comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_comment $post_comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post_comment  $post_comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post_comment $post_comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post_comment  $post_comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post_comment $post_comment)
    {
        //
    }
}
