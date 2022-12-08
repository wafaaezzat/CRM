<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\actionUser;
use App\Http\Requests\Storeaction_userRequest;
use App\Http\Requests\Updateaction_userRequest;
use App\Models\User;
use http\Env\Request;

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
    public function create($id)
    {
        $customer=User::find($id);
        $actions=Action::all();
        return view('dashboards.employees.actions.add',compact('customer','actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeaction_userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request,$id)
    {
        $customer=User::find($id);
        $customer->actions()->attach($request->action_id);
        return redirect()->back()->with('success','Action added successfully!');
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

    public function add_result(\Illuminate\Http\Request $request ,$id)
    {
        $action=ActionUser::find($id);
        $action->result=$request->result;
        $action->save();
        return redirect()->back()->with('success','Result added successfully!');
    }


    public function result($id){
        $action=ActionUser::find($id);
        return view('dashboards.employees.actions.result',compact('action'));
    }
}
