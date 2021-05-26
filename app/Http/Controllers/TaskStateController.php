<?php

namespace App\Http\Controllers;

use App\Task_state;
use Illuminate\Http\Request;

class TaskStateController extends Controller
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
     * @param  \App\Task_state  $task_state
     * @return \Illuminate\Http\Response
     */
    public function show(Task_state $task_state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task_state  $task_state
     * @return \Illuminate\Http\Response
     */
    public function edit(Task_state $task_state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task_state  $task_state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task_state $task_state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task_state  $task_state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task_state $task_state)
    {
        //
    }
}
