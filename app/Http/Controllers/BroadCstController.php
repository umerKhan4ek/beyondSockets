<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Events\MessageEvent;

class BroadCstController extends Controller
{
    //

    public function index()
    {
        $getAllUsers  = User::where('id','!=',Auth::user()->id)->get();

        return view('form')->with('NonUsers',$getAllUsers);
    }

    public function fire(Request $request)
    {
        // dd($request->all());
        event(new MessageEvent($request->userid,$request->activeuser));
        return $request->all();


        
    }
}
