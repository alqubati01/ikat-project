<?php

namespace App\Http\Controllers;

use App\Ativity;
use App\notification;
use App\Project;
use App\Project_team;
use App\Task;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
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
//        return $this->findpro(Auth::id());
        $pro= Project::where('owner_id',Auth::id())->get();
        $team = Team::where('captain_id',Auth::id())->get();
        $belong=$this->findpro(Auth::id());
//        return $belong;
        $arr =array('data'=>$pro,'members'=>$team,'belong'=>$belong);
        return view('projects.index',$arr);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        //
        $project=new Project();
        $project->name=$request->input('p_name');
        $project->desc=$request->input('p_desc');
        $project->owner_id=Auth::id();
        $project->save();
        $teamp=new Project_team();
        $teamp->Project_id=$project->id;
        $teamp->member_id=Team::where('captain_id',Auth::id())->where('member_id',Auth::id())->first()->id;
        $teamp->role="1";
        $teamp->save();

        if(!empty($request->input('members')))
        {
            foreach($request->input('members') as $file)
            {


                if (!Project_team::where('Project_id',$project->id)->where('member_id',$file)->first()) {
                    $team=new Project_team();
                    $team->Project_id=$project->id;
                    $team->member_id=$file;
                    $team->save();



                    $notic = new notification();
                    $notic->user_id = Team::find($file)->user->id;
                    $notic->message = Auth::user()->name . " Add you to his team  ( ".$project->name." )";
                    $notic->url = "#";
                    $notic->type=3;
                    $notic->save();

                }
            }
        }

        return back()->with('status', 'Project Added successfully');

//        $team=new Team();
//        $team->
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
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $project=Project::where('id',$id)->first();
        $project22=self::findpro2(Auth::id());


//        $task=$project->task->pluck('created_at');
//        return $project22;

        $team_project=Team::
            where('captain_id',Auth::id())->whereNotIn('id',function($query) use ($project) {
            $query->select('member_id')->from('project_teams')
                ->where('project_id',$project->id);
        })->get();


        $pro=Task::whereHas('project', function ($q) use ($id) {
            $q->where('id', $id);
        })
            ->orderby('state')->get();


        $pr=array([],[],[]);
        foreach ($pro as $p){
            if ($p->state== 0){
                $pr['0'][]=$p;
            }

            elseif ($p->state== 1){
                $pr['1'][]=$p;
            }

            elseif ($p->state== 2){
                $pr['2'][]=$p;
            }
        }

        $arr =array('data'=>$project,'task'=>$pr,'project22'=>$project22,'team_project'=>$team_project);

        return view('projects.show',$arr);
        //
    }


    public function show_belong($id)
    {


        $project=Project::where('id',$id)->first();
        $project22=$this->findpro(Auth::id());

        $team_project=Team::
        where('captain_id',Auth::id())->whereNotIn('id',function($query) use ($project) {
            $query->select('member_id')->from('project_teams')
                ->where('project_id',$project->id);
        })->get();

//
        //        return $team_project;
        $arr =array('data'=>$project,'project22'=>$project22,'team_project'=>$team_project);

//        return $project;
        return view('projects.show_belong',$arr);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        if ($request->isMethod('post')){
            $project=Project::find($id);
            $project->name=$request->input('p_name');
            $project->desc=$request->input('p_desc');
            $project->owner_id=Auth::id();
            $project->save();
            $act=new Ativity();
            $act->date=Carbon::now()->toDateTimeString();
            $act->act=Auth::user()->name." update project  ";
            $act->project_id=$id;
            $act->save();

            return back()->with('status', 'Project updated successfully');

        }
        else{
            $project=Project::where('id',$id)->first();
            $team_project=Team::
            where('captain_id',Auth::id())->
            whereNotIn('id',function($query)use ($project) {
                $query->select('member_id')->from('project_teams')
                    ->where('project_id',$project->id);
            })->get();
            $arr =array('data'=>$project,'team_project'=>$team_project);
            return view('projects.edit',$arr);
//            return redirect('/');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project ,$id)
    {
        //

        $project=Project::where('id', $id)->delete();

        return back()->with('status', 'Project deleted successfully');

    }

    public  function project_task($id){


        $project=Project::find($id);
        $project22=self::findpro2(Auth::id());

        $pro=Task::whereHas('project', function ($q) use ($id) {
            $q->where('id', $id);
        })
            ->orderby('state')->get();


//        return $pr;
        $arr= array('data'=>$project,'project22'=>$project22,'project'=>$project);
        return view('projects.project_task',$arr);
    }

    public   function  findpro($u_id ){
        $pr=Project::whereHas('project_team', function ($q) use ($u_id) {
                $q->whereHas('team', function ($q) use ($u_id) {
                    $q->whereHas('user', function ($q) use ($u_id) {
                        $q->where('id', $u_id);
                    });
                });
            })
            ->get();

        return $pr;
    }

    public  static function  findpro2($u_id ){
        $pr=Project::whereHas('project_team', function ($q) use ($u_id) {
            $q->whereHas('team', function ($q) use ($u_id) {
                $q->whereHas('user', function ($q) use ($u_id) {
                    $q->where('id', $u_id);
                });
            });
        })
            ->orwhere('owner_id',$u_id)
            ->get();

        return $pr;
    }

    public  static function  team_project($project ){
        $pr=Team::
        where('captain_id',Auth::id())->whereNotIn('id',function($query) use ($project) {
            $query->select('member_id')->from('project_teams')
                ->where('project_id',$project->id);
        })->get();
        return $pr;
    }




    public static function  find_role($t_id){
//        $u_id=$t->id;
        $role=Project_team::whereHas('team', function ($q)  {
            $q->whereHas('user', function ($q) {
                $q->where('id', Auth::id());

            });
        })
            ->where('project_id',$t_id)
            ->first();
        return $role;
    }

    public static function  find_task(){
        $task=Project::whereHas('project_team', function ($q)  {
            $q->whereHas('team', function ($q)  {
                $q->whereHas('user', function ($q)  {
                    $q->where('id', Auth::id());
                });
            });
        })
            ->whereHas('task', function ($q)  {

            })

            ->get();
        return $task;
    }



}
