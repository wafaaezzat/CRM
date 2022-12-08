<?php

namespace App\Http\Controllers;

use App\Charts\AttendeeTotalHours;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
   public function index(){
       $count=User::all()->count();
       $customers=User::where('role_id',3)->count();
       $employees=User::where('role_id',2)->count();
       $admins=User::where('role_id',1)->count();
       return view('dashboards.admins.index',compact('count','customers','employees','admins'));
   }


    function profile(){
        return view('dashboards.admins.profile');
    }

    function updateInfo(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=> 'required'
        ]);
        User::find(Auth::user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return redirect()->back()->with('success','Your profile info has been update successfully.');
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
        return  redirect('admin/profile');

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
        return redirect('admin/profile');
    }




}
