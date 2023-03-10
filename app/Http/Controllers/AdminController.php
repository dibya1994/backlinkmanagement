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
}
