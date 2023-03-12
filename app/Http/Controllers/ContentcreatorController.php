<?php

namespace App\Http\Controllers;

use App\Models\Contentcreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class ContentcreatorController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.contentcreator.view');
    }

    
    public function create()
    {
        return view('admin.contentcreator.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone' => 'required|digits:10|unique:contentcreators',
            'email'=> 'required|unique:contentcreators',
        ]);
        $contentcreator=New Contentcreator;
        $contentcreator->name = $request->name;
        $contentcreator->email = $request->email;
        $contentcreator->phone = $request->phone;
        $contentcreator->password = Hash::make($request->password);
        $contentcreator->active_status = $request->active_status;
       
        if($contentcreator->save())
        {
            return redirect('/admin/contentcreator/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/contentcreator/create')->with('error', 'Something Went Wrong');
        }
    }
    public function show(Contentcreator $contentcreator)
    {
        //
    }

    
    public function edit(Contentcreator $contentcreator)
    {
        return view('admin.contentcreator.update',compact('contentcreator'));
    }

    
    public function update(Request $request, Contentcreator $contentcreator)
    {
        if($request->password=='')
        {
            $new_password=$request->previous_password;
        }
        else
        {
            $new_password=Hash::make($request->password);
        }

        $contentcreator->name = $request->name;
        $contentcreator->email = $request->email;
        $contentcreator->phone = $request->phone;
        $contentcreator->password = $new_password;
        $contentcreator->active_status = $request->active_status;

        if($contentcreator->save())
        {
            return redirect('/admin/contentcreator/'.$contentcreator->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/contentcreator/'.$contentcreator->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

   
    public function destroy(Contentcreator $contentcreator)
    {
        if ($contentcreator->delete()) {
            return redirect('/admin/contentcreator/')->with('success', 'Deleted Successfully');
        }
    }


    //Content Creator Part Start
    public function index2()
    {
        return view('contentcreator.index');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        if(Auth::guard('contentcreator')->attempt(['email'=>$request->email,'password'=>$request->password,'active_status'=>'YES'])){
            return redirect('/contentcreator/dashboard');
        }
        else{
            return redirect('/contentcreator')->withInput()->with('error', 'Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::guard('contentcreator')->logout();
        return redirect('/contentcreator/');
    }


    public function dashboard()
    {
        return view('contentcreator.dashboard');
    }

    public function profile()
    {
        return view('contentcreator.profile');
    }
    
    public function update_profile(Request $request)
    {
            $result=array(
                'name'=>$request->name,
                'email'=>$request->email
            );
               $status = DB::table('contentcreators')
                  ->where('id', Auth::guard('contentcreator')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/contentcreator/profile')->with('success', 'Updated Successfully');
            }
            else{
                return redirect('/contentcreator/profile')->with('error', 'Something Went Wrong');
            }
           
    }
    public function change_password()
    {
        return view('contentcreator.change_password');
    }
    public function update_password(Request $request)
    {
            $result=array(
                'password'=>Hash::make($request->password)
            );
               $status = DB::table('contentcreators')
                  ->where('id', Auth::guard('contentcreator')->user()->id)
                  ->update($result);
    
            if($status==true){
                return redirect('/contentcreator/change-password')->with('success', 'Password Changed Successfully');
            }
            else{
                return redirect('/contentcreator/change-password')->with('error', 'Something Went Wrong');
            }
        
           
    }
}
