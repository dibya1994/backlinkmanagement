<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('superadmin.admin.view');
    }

    
    public function create()
    {
        return view('superadmin.admin.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|digits:10|unique:admins',
            'email'=> 'required|unique:admins',
        ]);
        $admin=New Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->active_status = $request->active_status;
       
        if($admin->save())
        {
            return redirect('/superadmin/admin/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/superadmin/admin/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(Admin $admin)
    {
        //
    }

   
    public function edit(Admin $admin)
    {
        return view('superadmin.admin.update',compact('admin'));
    }

    
    public function update(Request $request, Admin $admin)
    {
        
       
        if($request->password=='')
        {
            $new_password=$request->previous_password;
        }
        else
        {
            $new_password=Hash::make($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = $new_password;
        $admin->active_status = $request->active_status;

        if($admin->save())
        {
            return redirect('/superadmin/admin/'.$admin->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/superadmin/admin/'.$admin->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if ($admin->delete()) {
            return redirect('/superadmin/admin/')->with('success', 'Deleted Successfully');
        }
    }



    //Admin Part Start
    public function index2()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password,'active_status'=>'YES'])){
            return redirect('/admin/dashboard');
        }
        else{
            return redirect('/admin')->withInput()->with('error', 'Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }
    
    public function update_profile(Request $request)
    {
            $result=array(
                'name'=>$request->name,
                'email'=>$request->email
            );
               $status = DB::table('admins')
                  ->where('id', Auth::guard('admin')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/admin/profile')->with('success', 'Updated Successfully');
            }
            else{
                return redirect('/admin/profile')->with('error', 'Something Went Wrong');
            }
           
    }
    public function change_password()
    {
        return view('admin.change_password');
    }
    public function update_password(Request $request)
    {
            $result=array(
                'password'=>Hash::make($request->password)
            );
               $status = DB::table('admins')
                  ->where('id', Auth::guard('admin')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/admin/change-password')->with('success', 'Password Changed Successfully');
            }
            else{
                return redirect('/admin/change-password')->with('error', 'Something Went Wrong');
            }
        
           
    }
}
