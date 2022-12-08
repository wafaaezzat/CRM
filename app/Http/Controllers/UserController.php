<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        $users=User::paginate(15);
        return view('dashboards.admins.users.users',compact('roles','users'));
    }


    public function create()
    {
        $roles=Role::all();
        $users=User::all();
        return view('dashboards.admins.users.manage-users',compact('roles','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => [ 'required','regex:/(01)[0-9]{9}/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required','exists:roles,id'],
        ]);
        User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'address' => $request['address'],
            'role_id' =>$request['role_id'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('admin/users')->with('success','User added successfully');
    }


    public function show()
    {
        //
    }


    public function edit($id)
    {

        $roles=Role::all();
        $user = User::find($id);
        return view('dashboards.admins.users.edit-users', compact('user','roles'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => [ 'required','regex:/(01)[0-9]{9}/'],
            'address' => ['required', 'string'],
        ]);
        User::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'role_id' =>$request['role_id'],
        ]);
        $user=User::find($id);
        $user->role_id=$request->role_id;
        $user->phone=$request->phone;
        $user->save();
        return redirect('admin/users')->with('success','User Updated successfully');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/users')->with('success', 'User Deleted successfully.');
    }


    public function assign($id){
        $customer=User::find($id);
        $employees=User::where('role_id',2)->get();
        return view('dashboards.admins.users.assign-customer', compact('customer','employees'));
    }

    public function assign_update(Request $request,$id){
        $customer=User::find($id);
        $customer->parent_id=$request->employee_id;
        $customer->save();
        return redirect('admin/customers')->with('success', 'Customer assigned to employee successfully.');
    }

    public function customers(){
        $employees=User::where('role_id',2)->get();
        $customers=User::where('role_id',3)->get();
        return view('dashboards.admins.users.customers', compact('employees','customers'));
    }
}
