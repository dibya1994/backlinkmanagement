<?php

namespace App\Http\Controllers;

use App\Models\Backlinkmanager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class BacklinkmanagerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.backlinkmanager.view');
    }

    
    public function create()
    {
        return view('admin.backlinkmanager.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|digits:10|unique:backlinkmanagers',
            'email'=> 'required|unique:backlinkmanagers',
        ]);
        $backlinkmanager=New Backlinkmanager;
        $backlinkmanager->name = $request->name;
        $backlinkmanager->email = $request->email;
        $backlinkmanager->phone = $request->phone;
        $backlinkmanager->password = Hash::make($request->password);
        $backlinkmanager->active_status = $request->active_status;
       
        if($backlinkmanager->save())
        {
            return redirect('/admin/backlinkmanager/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/backlinkmanager/create')->with('error', 'Something Went Wrong');
        }
    }
    public function show(Backlinkmanager $backlinkmanager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Backlinkmanager $backlinkmanager)
    {
        return view('admin.backlinkmanager.update',compact('backlinkmanager'));
    }

    public function update(Request $request, Backlinkmanager $backlinkmanager)
    {
        if($request->password=='')
        {
            $new_password=$request->previous_password;
        }
        else
        {
            $new_password=Hash::make($request->password);
        }

        $backlinkmanager->name = $request->name;
        $backlinkmanager->email = $request->email;
        $backlinkmanager->phone = $request->phone;
        $backlinkmanager->password = $new_password;
        $backlinkmanager->active_status = $request->active_status;

        if($backlinkmanager->save())
        {
            return redirect('/admin/backlinkmanager/'.$backlinkmanager->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/backlinkmanager/'.$backlinkmanager->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

    
    public function destroy(Backlinkmanager $backlinkmanager)
    {
        if ($backlinkmanager->delete()) {
            return redirect('/admin/backlinkmanager/')->with('success', 'Deleted Successfully');
        }
    }


    //Backlink Manager Part Start
    public function index2()
    {
        return view('backlinkmanager.index');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        if(Auth::guard('backlinkmanager')->attempt(['email'=>$request->email,'password'=>$request->password,'active_status'=>'YES'])){
            return redirect('/backlinkmanager/dashboard');
        }
        else{
            return redirect('/backlinkmanager')->withInput()->with('error', 'Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::guard('backlinkmanager')->logout();
        return redirect('/backlinkmanager/');
    }


    public function dashboard()
    {
        return view('backlinkmanager.dashboard');
    }

    public function profile()
    {
        return view('backlinkmanager.profile');
    }
    
    public function update_profile(Request $request)
    {
            $result=array(
                'name'=>$request->name,
                'email'=>$request->email
            );
               $status = DB::table('backlinkmanagers')
                  ->where('id', Auth::guard('backlinkmanager')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/backlinkmanager/profile')->with('success', 'Updated Successfully');
            }
            else{
                return redirect('/backlinkmanager/profile')->with('error', 'Something Went Wrong');
            }
           
    }
    public function change_password()
    {
        return view('backlinkmanager.change_password');
    }
    public function update_password(Request $request)
    {
            $result=array(
                'password'=>Hash::make($request->password)
            );
               $status = DB::table('backlinkmanagers')
                  ->where('id', Auth::guard('backlinkmanager')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/backlinkmanager/change-password')->with('success', 'Password Changed Successfully');
            }
            else{
                return redirect('/backlinkmanager/change-password')->with('error', 'Something Went Wrong');
            }
        
           
    }
}
