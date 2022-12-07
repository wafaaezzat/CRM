<?php

namespace App\Http\Controllers;

use App\Models\actionResult;
use App\Http\Requests\Storeaction_resultRequest;
use App\Http\Requests\Updateaction_resultRequest;

class ActionResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Http\Requests\Storeaction_resultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeaction_resultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\actionResult  $action_result
     * @return \Illuminate\Http\Response
     */
    public function show(actionResult $action_result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\actionResult  $action_result
     * @return \Illuminate\Http\Response
     */
    public function edit(actionResult $action_result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateaction_resultRequest  $request
     * @param  \App\Models\actionResult  $action_result
     * @return \Illuminate\Http\Response
     */
    public function update(Updateaction_resultRequest $request, actionResult $action_result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\actionResult  $action_result
     * @return \Illuminate\Http\Response
     */
    public function destroy(actionResult $action_result)
    {
        //
    }
}
