<?php

namespace App\Http\Controllers;

use App\Assignation;
use App\Ativity;
use App\Project;
use App\Project_team;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
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
    public function store(Request $request,$id)
    {
        //
//        return $this->finduser(Auth::id(),$id);

        $task=new Task();
        $task->delivery_date=$request->input('t_date');
        $task->body=$request->input('t_desc');
        $task->project_id=$id;
        $task->owner_id= $this->finduser(Auth::id(),$id);
//        return $this->finduser(Auth::id(),$id);
        $task->save();
//        return Project::find($id)->name;
        $act=new Ativity();
        $act->date=Carbon::now()->toDateTimeString();
        $act->act=Auth::user()->name." create a new task on  ";
        $act->project_id=$id;
        $act->save();
        if(!empty($request->input('assign_to')))
        {
            $assign_to=new Assignation();
            $assign_to->date= date('Y-m-d H:i:s');;
            $assign_to->member_id=$request->input('assign_to');
            $assign_to->task_id=$task->id;
            $assign_to->save();
            $act=new Ativity();
            $act->date=Carbon::now()->toDateTimeString();
            $act->act=Auth::user()->name." update  task on ";
            $act->project_id=$id;
            $act->save();
//            $affectedRows =
            Task::where('id', $task->id)->update(['state' => 0]);
        }
        return back()->with('status', 'task created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $task=Task::find($id);
//        $task=Assignation::find(5);
        $arr=array('task'=>$task);
        return view('tasks.show',$arr);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task ,$id)
    {
        //


        $act=new Ativity();
        $act->date=Carbon::now()->toDateTimeString();
        $act->act=Auth::user()->name." update  task on ";
        $act->project_id=Task::find($id)->project->id;
        $act->save();

        $task=Task::where('id', $id)->delete();

        return back()->with('status', 'task deleted successfully');
    }

    public  function finduser($u_id ,$p_id){
        $memb=Project_team::
        where('Project_id',$p_id)
            ->whereHas('team', function ($q) use ($u_id) {
                $q->whereHas('user', function ($q) use ($u_id) {
                    $q->where('id', $u_id);
                });
            })
            ->first();

        return $memb['id'];
    }
}
