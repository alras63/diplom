<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\ActivityOrder;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // foreach (Auth::user()->requests as $index => $request) {
        //     $request = ModelsRequest::where('id', $request->id)->first();
        //     var_dump($request->course);
        // }
        return view('profile');
    }
    public function requests()
    {
        // foreach (Auth::user()->requests as $index => $request) {
        //     $request = ModelsRequest::where('id', $request->id)->first();
        //     var_dump($request->course);
        // }
        return view('profile', ['activetab'=>'requests']);
    }
    public function activities()
    {
        // foreach (Auth::user()->requests as $index => $request) {
        //     $request = ModelsRequest::where('id', $request->id)->first();
        //     var_dump($request->course);
        // }
       
        // $activities = Activities::all();
        // foreach($activities as $act) {
        //     $order = ActivityOrder::where("id", $act->id)->where("user_id", Auth::user()->id)->first();
        // }
        return view('profile', ['activetab'=>'activities', 'activities'=>Activities::all()]);
    }
    public function help()
    {
        // foreach (Auth::user()->requests as $index => $request) {
        //     $request = ModelsRequest::where('id', $request->id)->first();
        //     var_dump($request->course);
        // }
        return view('profile', ['activetab'=>'help']);
    }
}
