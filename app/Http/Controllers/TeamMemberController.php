<?php

namespace App\Http\Controllers;

use App\Team_member;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
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
     * @param  \App\Team_member  $team_member
     * @return \Illuminate\Http\Response
     */
    public function show(Team_member $team_member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team_member  $team_member
     * @return \Illuminate\Http\Response
     */
    public function edit(Team_member $team_member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team_member  $team_member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team_member $team_member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team_member  $team_member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team_member $team_member)
    {
        //
    }
}
