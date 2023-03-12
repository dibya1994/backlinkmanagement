<?php

namespace App\Http\Controllers;

use App\Models\Digitalmarketer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class DigitalmarketerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.digitalmarketer.view');
    }

    
    public function create()
    {
        return view('admin.digitalmarketer.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|digits:10|unique:digitalmarketers',
            'email'=> 'required|unique:digitalmarketers',
        ]);
        $digitalmarketer=New Digitalmarketer;
        $digitalmarketer->name = $request->name;
        $digitalmarketer->email = $request->email;
        $digitalmarketer->phone = $request->phone;
        $digitalmarketer->password = Hash::make($request->password);
        $digitalmarketer->active_status = $request->active_status;
       
        if($digitalmarketer->save())
        {
            return redirect('/admin/digitalmarketer/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/digitalmarketer/create')->with('error', 'Something Went Wrong');
        }
    }
    public function show(Digitalmarketer $digitalmarketer)
    {
        //
    }

    
    public function edit(Digitalmarketer $digitalmarketer)
    {
        return view('admin.digitalmarketer.update',compact('digitalmarketer'));
    }

    
    public function update(Request $request, Digitalmarketer $digitalmarketer)
    {
        if($request->password=='')
        {
            $new_password=$request->previous_password;
        }
        else
        {
            $new_password=Hash::make($request->password);
        }

        $digitalmarketer->name = $request->name;
        $digitalmarketer->email = $request->email;
        $digitalmarketer->phone = $request->phone;
        $digitalmarketer->password = $new_password;
        $digitalmarketer->active_status = $request->active_status;

        if($digitalmarketer->save())
        {
            return redirect('/admin/digitalmarketer/'.$digitalmarketer->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/digitalmarketer/'.$digitalmarketer->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Digitalmarketer $digitalmarketer)
    {
        if ($digitalmarketer->delete()) {
            return redirect('/admin/digitalmarketer/')->with('success', 'Deleted Successfully');
        }
    }


    //Digital Marketer Part Start
    public function index2()
    {
        return view('digitalmarketer.index');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        if(Auth::guard('digitalmarketer')->attempt(['email'=>$request->email,'password'=>$request->password,'active_status'=>'YES'])){
            return redirect('/digitalmarketer/dashboard');
        }
        else{
            return redirect('/digitalmarketer')->withInput()->with('error', 'Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::guard('digitalmarketer')->logout();
        return redirect('/digitalmarketer/');
    }


    public function dashboard()
    {
        return view('digitalmarketer.dashboard');
    }

    public function profile()
    {
        return view('digitalmarketer.profile');
    }
    
    public function update_profile(Request $request)
    {
            $result=array(
                'name'=>$request->name,
                'email'=>$request->email
            );
               $status = DB::table('digitalmarketers')
                  ->where('id', Auth::guard('digitalmarketer')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/digitalmarketer/profile')->with('success', 'Updated Successfully');
            }
            else{
                return redirect('/digitalmarketer/profile')->with('error', 'Something Went Wrong');
            }
           
    }
    public function change_password()
    {
        return view('digitalmarketer.change_password');
    }
    public function update_password(Request $request)
    {
            $result=array(
                'password'=>Hash::make($request->password)
            );
               $status = DB::table('digitalmarketers')
                  ->where('id', Auth::guard('digitalmarketer')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/digitalmarketer/change-password')->with('success', 'Password Changed Successfully');
            }
            else{
                return redirect('/digitalmarketer/change-password')->with('error', 'Something Went Wrong');
            }
        
           
    }
}
