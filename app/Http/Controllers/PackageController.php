<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class PackageController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('superadmin.package.view');
    }

    
    public function create()
    {
        return view('superadmin.package.create');
    }

    
    public function store(Request $request)
    {
        
        $package=New Package;
        $package->package_name = $request->package_name;
        $package->duration = $request->duration;
        $package->price = $request->price;
        $package->user_limit = $request->user_limit;
        $package->max_project = $request->max_project;
        $package->active_status = $request->active_status;
       
        if($package->save())
        {
            return redirect('/superadmin/package/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/superadmin/package/create')->with('error', 'Something Went Wrong');
        }
    }
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('superadmin.package.update',compact('package'));
    }

   
    public function update(Request $request, Package $package)
    {
        $package->package_name = $request->package_name;
        $package->duration = $request->duration;
        $package->price = $request->price;
        $package->user_limit = $request->user_limit;
        $package->max_project = $request->max_project;
        $package->active_status = $request->active_status;

        if($package->save())
        {
            return redirect('/superadmin/package/'.$package->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/superadmin/package/'.$package->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }


    public function destroy(Package $package)
    {
        if ($package->delete()) {
            return redirect('/superadmin/package/')->with('success', 'Deleted Successfully');
        }
    }
}
