<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        $users=User::all();
        return view('dashboards.admins.roles.roles',compact('roles','users'));
    }


    public function create()
    {
        return view('dashboards.admins.roles.create-role');
    }


    public function store(Request $request)
    {
        $request->validate([
            'role_name' => ['required', 'string', 'max:255'],
        ]);
        Role::create([
            'name' => $request['role_name'],
            'created_by' => Auth::id(),

        ]);
        return redirect('admin/roles')->with('success','Role added successfully');
    }


    public function show()
    {
        //
    }


    public function edit($id)
    {
        $role = Role::find($id);
        return view('dashboards.admins.roles.edit-role', compact('role'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'role_name' => ['required', 'string', 'max:255'],
        ]);
        Role::find($id)->update([
            'name' => $request['role_name'],
        ]);
        return redirect('admin/roles')->with('success','User added successfully');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('admin/roles')->with('success', 'Role Deleted successfully.');
    }

}
