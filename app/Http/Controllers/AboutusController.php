<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class AboutusController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('superadmin.aboutus.view');
    }

    
    public function create()
    {
        return view('superadmin.aboutus.create');
    }
    public function store(Request $request)
    {
        $aboutus=New Aboutus;
        $aboutus->description = $request->description;
       
        if($aboutus->save())
        {
            return redirect('/superadmin/aboutus/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/superadmin/aboutus/create')->with('error', 'Something Went Wrong');
        }
    }
    public function show(Aboutus $aboutus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aboutus $aboutus)
    {
        return view('superadmin.aboutus.update',compact('aboutus'));
    }

    
    public function update(Request $request, Aboutus $aboutus)
    {
        $aboutus->description = $request->description;

        if($aboutus->save())
        {
            return redirect('/superadmin/aboutus/'.$aboutus->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/superadmin/aboutus/'.$aboutus->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

   
    public function destroy(Aboutus $aboutus)
    {
        if ($aboutus->delete()) {
            return redirect('/superadmin/aboutus/')->with('success', 'Deleted Successfully');
        }
    }
}
