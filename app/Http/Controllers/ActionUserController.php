<?php

namespace App\Http\Controllers;

use App\Models\actionUser;
use App\Http\Requests\Storeaction_userRequest;
use App\Http\Requests\Updateaction_userRequest;

class ActionUserController extends Controller
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
     * @param  \App\Http\Requests\Storeaction_userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeaction_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\actionUser  $action_user
     * @return \Illuminate\Http\Response
     */
    public function show(actionUser $action_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\actionUser  $action_user
     * @return \Illuminate\Http\Response
     */
    public function edit(actionUser $action_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateaction_userRequest  $request
     * @param  \App\Models\actionUser  $action_user
     * @return \Illuminate\Http\Response
     */
    public function update(Updateaction_userRequest $request, actionUser $action_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\actionUser  $action_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(actionUser $action_user)
    {
        //
    }
}
