<?php

namespace App\Http\Controllers;

use App\Models\Termscondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class TermsconditionController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('superadmin.termscondition.view');
    }

    
    public function create()
    {
        return view('superadmin.termscondition.create');
    }
    public function store(Request $request)
    {
        $termscondition=New Termscondition;
        $termscondition->description = $request->description;
       
        if($termscondition->save())
        {
            return redirect('/superadmin/termscondition/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/superadmin/termscondition/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(Termscondition $termscondition)
    {
        //
    }

  
    public function edit(Termscondition $termscondition)
    {
        return view('superadmin.termscondition.update',compact('termscondition'));
    }

    
    public function update(Request $request, Termscondition $termscondition)
    {
        $termscondition->description = $request->description;

        if($termscondition->save())
        {
            return redirect('/superadmin/termscondition/'.$termscondition->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/superadmin/termscondition/'.$termscondition->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

    public function destroy(Termscondition $termscondition)
    {
        if ($termscondition->delete()) {
            return redirect('/superadmin/termscondition/')->with('success', 'Deleted Successfully');
        }
    }
}
