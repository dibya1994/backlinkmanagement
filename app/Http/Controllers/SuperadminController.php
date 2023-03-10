<?php

namespace App\Http\Controllers;

use App\Models\Superadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class SuperadminController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('superadmin.index');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        if(Auth::guard('superadmin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/superadmin/dashboard');
        }
        else{
            return redirect('/superadmin')->withInput()->with('error', 'Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::guard('superadmin')->logout();
        return redirect('/superadmin/');
    }


    public function dashboard()
    {
        return view('superadmin.dashboard');
    }

    public function profile()
    {
        return view('superadmin.profile');
    }
    
    public function update_profile(Request $request)
    {
            $result=array(
                'name'=>$request->name,
                'email'=>$request->email
            );
               $status = DB::table('superadmins')
                  ->where('id', Auth::guard('superadmin')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/superadmin/profile')->with('success', 'Updated Successfully');
            }
            else{
                return redirect('/superadmin/profile')->with('error', 'Something Went Wrong');
            }
           
    }
    public function change_password()
    {
        return view('superadmin.change_password');
    }
    public function update_password(Request $request)
    {
            $result=array(
                'password'=>Hash::make($request->password)
            );
               $status = DB::table('superadmins')
                  ->where('id', Auth::guard('superadmin')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/superadmin/change-password')->with('success', 'Password Changed Successfully');
            }
            else{
                return redirect('/superadmin/change-password')->with('error', 'Something Went Wrong');
            }
        
           
    }
}
