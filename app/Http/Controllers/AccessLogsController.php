<?php

namespace App\Http\Controllers;

use App\Models\AccessLogs;
use Illuminate\Http\Request;

class AccessLogsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('logs');
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
     * @param  \App\Models\AccessLogs  $accessLogs
     * @return \Illuminate\Http\Response
     */
    public function show(AccessLogs $accessLogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccessLogs  $accessLogs
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessLogs $accessLogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccessLogs  $accessLogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessLogs $accessLogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccessLogs  $accessLogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessLogs $accessLogs)
    {
        //
    }
}
