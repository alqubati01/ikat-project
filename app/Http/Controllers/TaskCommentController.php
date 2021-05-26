<?php

namespace App\Http\Controllers;

use App\Assignation;
use App\Ativity;
use App\Project;
use App\Project_team;
use App\Task;
use App\Task_comment;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskCommentController extends Controller
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

        $pr=Task::find($id)->project->id;
//        return $pr;
//        return $this->finduser(Auth::id(),$pr);
        if (!empty($request->input('comment'))) {

            $task_comment = new Task_comment();
            $task_comment->comment = $request->input('comment');
            $task_comment->type = 0;
            $task_comment->commenter_id =$this->finduser(Auth::id(),$pr);
            $task_comment->task_id = $id;
            $task_comment->save();
            $act=new Ativity();
            $act->date=Carbon::now()->toDateTimeString();
            $act->act=Auth::user()->name." Add a comment in  task on ";
            $act->project_id=Task::find($id)->project->id;
            $act->save();
        }
        if (!empty($request->hasFile('file'))){


            $fileName = 'uploads/'.time().'.'.$request->file('file')->extension();
            $request->file->move(public_path('uploads'), $fileName);
            $task_file = new Task_comment();
            $task_file->file=$fileName;
            $task_file->type = 1;
            $task_file->commenter_id = Auth::id();
            $task_file->task_id = $id;
            $task_file->save();

            $act=new Ativity();
            $act->date=Carbon::now()->toDateTimeString();
            $act->act=Auth::user()->name." upload a file in  task on ";
            $act->project_id=Task::find($id)->project->id;
            $act->save();
        }

        return back()->with('status','your comment is added successfully');




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task_comment  $task_comment
     * @return \Illuminate\Http\Response
     */
    public function show(Task_comment $task_comment)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task_comment  $task_comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Task_comment $task_comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task_comment  $task_comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task_comment $task_comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task_comment  $task_comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task_comment $task_comment)
    {
        //
    }

    public  function finduser($u_id ,$p_id){
        $memb=Project_team::where('Project_id',$p_id)
        ->whereHas('team', function ($q) use ($u_id) {
            $q->whereHas('user', function ($q) use ($u_id) {
                $q->where('id', $u_id);
            });
        })
            ->first();

        return $memb['id'];
    }

}
