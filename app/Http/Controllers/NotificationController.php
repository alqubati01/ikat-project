<?php

namespace App\Http\Controllers;

use App\notification;
use App\Post;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
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
    public function create()
    {
        //
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
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //

/*
        $post=Post::
        whereIn('user_id',function($query ){
            $query->select('captain_id')->from('teams')
                ->where('member_id',Auth::id())
                ->where('notification','>',0);
        })->get();
        $post2=Team::where('member_id',Auth::id())
            ->where('notification','>',0)->max('notification');
        $ar1=array() ;
        foreach ($post as $key=>$pp){
            if ($pp->notification !="" && $pp->notification->state==1){
                $ar1[$key]=$pp->notification;
                $ar1[$key]['username']=$pp->user->name;
                $ar1[$key]['date']=$pp->created_at->diffForHumans();

            }
        }*/


        $notic= notification::where('user_id',Auth::id())->where('state',1)->get();

        $notic2= notification::where('user_id',Auth::id())->where('state',1)->where('type',1)->get()    ;

        $notic =  $notic->reverse();
        $notic2 =  $notic2->reverse();

        $arr=array('data'=>$notic,'data2'=>$notic2);

//        return $ar1;
        return Response()->json($arr);


    }

    public function post_notic(Request $request)
    {
        //

        if($request->id=='all') {
            notification::where('user_id',Auth::id())->where('type',1)->update(['state' => 0]);

        }
        else{

//            Post::find($request->id)->no;
            notification::where('user_id',Auth::id())->where('url',"http://127.0.0.1:8000/Posts#".$request->id)->update(['state' => 0]);
        }


        $arr=array('data'=>$request->id);

//        return $ar1;
        return Response()->json($arr);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(notification $notification)
    {
        //
    }
}
