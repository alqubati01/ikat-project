<?php

namespace App\Http\Controllers;

use App\Ativity;
use App\notification;
use App\Project;
use App\Project_team;
use App\Task;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProjectTeamController extends Controller
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
    public function store(Request $request ,$id)
    {
        //
        if(!empty($request->input('members')))
        {
            foreach($request->input('members') as $file)
            {

                if (!Project_team::where('Project_id',$id)->where('member_id',$file)->first()) {


                    $team=new Project_team();
                    $team->role=$request->input('role');
                    $team->Project_id=$id;
                    $team->member_id=$file;
                    $team->save();

                    $act=new Ativity();
                    $act->date=Carbon::now()->toDateTimeString();
                    $act->act=Auth::user()->name." Add member To  ";
                    $act->project_id=$id;
                    $act->save();



                    $notic = new notification();
                    $notic->user_id = Team::find($file)->user->id;
                    $notic->message = Auth::user()->name . " Add you to his project team  ( ".Project::find($id)->name." )";
                    $notic->url = "#";
                    $notic->type=3;
                    $notic->save();

                }


            }
        }
        return back()->with('status', 'Project members Added successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project_team  $project_team
     * @return \Illuminate\Http\Response
     */
    public function show(Project_team $project_team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project_team  $project_team
     * @return \Illuminate\Http\Response
     */
    public function edit(Project_team $project_team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project_team  $project_team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project_team $project_team,$id)
    {
        //
        $Project_team2=Project_team::find($id);
        $Project_team2->role=$Project_team2->role ==0?'1' :'0';

        $Project_team2->save();
        return back()->with('status', 'member role updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project_team  $project_team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project_team $project_team,$id)
    {
        //


        $notic = new notification();
        $notic->user_id = Project_team::find($id)->team->user->id;
        $notic->message = Auth::user()->name . " remove you from his project team  ";
        $notic->url = "#";
        $notic->type=2;
        $notic->save();

        $project=Project_team::where('id', $id)->delete();

        return back()->with('status', 'Project deleted successfully');
    }
}
