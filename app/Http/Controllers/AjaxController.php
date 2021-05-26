<?php

namespace App\Http\Controllers;

use App\Assignation;
use App\Project;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
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
     * @param  \App\Assignation  $assignation
     * @return \Illuminate\Http\Response
     */
    public function show(Assignation $assignation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignation  $assignation
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignation $assignation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignation  $assignation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignation $assignation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignation  $assignation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignation $assignation)
    {
        //
    }



    public function change_state(Request $request)
    {

        if($request->id && $request->state ) {

            $state=Task::find($request->id);
            $state->state=--$request->state;
            $state->save();
            $arr = array('data' => "done" );
            return Response()->json($arr);

        }

//        $arr = array('data' =>"ddddddddddddddddddd" );
//        return Response()->json($arr);




    }
}
