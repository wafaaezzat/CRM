<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(){
        $count=User::all()->count();
        $customers=User::where('role_id',3)->count();
        $employees=User::where('role_id',2)->count();
        $admins=User::where('role_id',1)->count();
        return view('dashboards.employees.index',compact('count','customers','employees','admins'));
    }


    function profile(){
        return view('dashboards.employees.profile');
    }
    function settings(){
        return view('dashboards.employees.settings');
    }

    function updateInfo(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id
        ]);

        if(!$validator->passes()){
            return redirect()->back()->with('error','Something went wrong.');
        }else{
            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'favoriteColor'=>$request->favoritecolor,
            ]);

            if(!$query){
                return redirect()->back()->with('error','Something went wrong.');
            }else{
                return redirect()->back()->with('success','Your profile info has been update successfuly.');
            }
        }
    }

    function updatePicture(Request $request){


        $user= User::find(Auth::id());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $user['picture']= $filename;
        }
        $user->save();
        return  redirect('employee/profile');

    }


    function changePassword(Request $request){
        //Validate form
        $validator = Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword'
        ],[
            'oldpassword.required'=>'Enter your current password',
            'oldpassword.min'=>'Old password must have atleast 8 characters',
            'oldpassword.max'=>'Old password must not be greater than 30 characters',
            'newpassword.required'=>'Enter new password',
            'newpassword.min'=>'New password must have atleast 8 characters',
            'newpassword.max'=>'New password must not be greater than 30 characters',
            'cnewpassword.required'=>'ReEnter your new password',
            'cnewpassword.same'=>'New password and Confirm new password must match'
        ]);

        if( $validator->passes() ){
            User::find(Auth::user()->id)->update(['password'=>Hash::make($request->newpassword)]);
        }
        return redirect('employee/profile');
    }
    function customers(){
        $customers=Auth::user()->children;
        return view('dashboards.employees.customers.customers',compact('customers'));
    }
   function create_customer(){
       $users=User::all();
        return view('dashboards.employees.customers.add',compact('users'));
    }
   function store_customer(Request $request){
       $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'phone' => [ 'required','regex:/(01)[0-9]{9}/'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'address' => ['required', 'string'],
           'password' => ['required', 'string', 'min:8', 'confirmed'],
       ]);
       User::create([
           'name' => $request['name'],
           'phone' => $request['phone'],
           'email' => $request['email'],
           'address' => $request['address'],
           'role_id' =>3,
           'parent_id' =>Auth::id(),
           'password' => Hash::make($request['password']),
       ]);
       return redirect('employee/customers')->with('success','Customer added successfully');
    }



}
