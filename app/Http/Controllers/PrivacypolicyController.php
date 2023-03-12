<?php

namespace App\Http\Controllers;

use App\Models\Privacypolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class PrivacypolicyController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('superadmin.privacypolicy.view');
    }

    
    public function create()
    {
        return view('superadmin.privacypolicy.create');
    }
    public function store(Request $request)
    {
        $privacypolicy=New Privacypolicy;
        $privacypolicy->description = $request->description;
       
        if($privacypolicy->save())
        {
            return redirect('/superadmin/privacypolicy/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/superadmin/privacypolicy/create')->with('error', 'Something Went Wrong');
        }
    }
    public function show(Privacypolicy $privacypolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Privacypolicy $privacypolicy)
    {
        return view('superadmin.privacypolicy.update',compact('privacypolicy'));
    }

    
    public function update(Request $request, Privacypolicy $privacypolicy)
    {
        $privacypolicy->description = $request->description;

        if($privacypolicy->save())
        {
            return redirect('/superadmin/privacypolicy/'.$privacypolicy->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/superadmin/privacypolicy/'.$privacypolicy->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

   
    public function destroy(Privacypolicy $privacypolicy)
    {
        if ($privacypolicy->delete()) {
            return redirect('/superadmin/privacypolicy/')->with('success', 'Deleted Successfully');
        }
    }
}
