<?php

namespace App\Http\Controllers;

use App\Ativity;
use Illuminate\Http\Request;

class AtivityController extends Controller
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
     * @param  \App\Ativity  $ativity
     * @return \Illuminate\Http\Response
     */
    public function show(Ativity $ativity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ativity  $ativity
     * @return \Illuminate\Http\Response
     */
    public function edit(Ativity $ativity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ativity  $ativity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ativity $ativity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ativity  $ativity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ativity $ativity)
    {
        //
    }
}
