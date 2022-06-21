<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Mail\issuesrequestsubimet;
use Illuminate\Http\Request;
use Auth;
use App\user;
class IssuesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['test']);
    }

    public function list()
    {
        $data['users'] = User::all();
        return view('issues.list', $data);
    }


    public function store(Request $request)
    {
        
        $issue = new Issue();
        $issue->name = $request->name ;
        $issue->email = $request->email ;
        $issue->phone = $request->phone ;
        $issue->msg = $request->mseeage ;
        $issue->building_number = $request->building_number ;
        $issue->apartment_number = $request->apartment_number ;
        $issue->user_id = Auth::user()->id;
        $issue->attachment = null ;
        $issue->save();

        \Mail::to($issue->email)->send(new issuesrequestsubimet($issue));
        return "successfully";
    }
    public function test()
    {
        return "amalllll";
    }
}
