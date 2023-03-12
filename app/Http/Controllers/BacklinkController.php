<?php

namespace App\Http\Controllers;

use App\Models\Backlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;

class BacklinkController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('backlinkmanager.backlink.view');
    }

    
    public function create()
    {
        return view('backlinkmanager.backlink.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Backlink $backlink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Backlink $backlink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Backlink $backlink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Backlink $backlink)
    {
        //
    }
}
