<?php

namespace App\Http\Controllers;

use App\notification;
use App\Project;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
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
        $team=Team::where('captain_id',Auth::id())->get();
        $users=User::
        whereNotIn('id',function($query){
            $query->select('member_id')->from('teams')
                ->where('captain_id',Auth::id());
        })->get();
//        return $team_project;

        $arr=array('data'=>$team,'users'=>$users);
        return view('Team.index',$arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->input('members'))
        {
            foreach($request->input('members') as $file)
            {
                $team=new Team();
                $team->captain_id=Auth::id();
                $team->member_id=$file;
                $team->save();


                $notic = new notification();
                $notic->user_id = $file;
                $notic->message = Auth::user()->name . " Add you to his team  ";
                $notic->url = "#";
                $notic->type=2;
                $notic->save();
            }
        }

        return back()->with('status', 'member Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team ,$id)
    {

        $notic = new notification();
        $notic->user_id = Team::find($id)->user->id;
        $notic->message = Auth::user()->name . " remove you from his team  ";
        $notic->url = "#";
        $notic->type=2;
        $notic->save();

        $team = Team::where('id',$id)->delete();
        return back()->with('status', 'member  deleted successfully');


    }
}
