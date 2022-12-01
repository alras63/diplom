<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\PriemEventsRequests;
use Illuminate\Http\Request;

class HomeController extends Controller
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

        return view('home');
    }

    public function checkQr($uniq)
    {
        $priemRequest = PriemEventsRequests::where('uniq', '=', $uniq)->first();

        if(null === $priemRequest) {
            return view('checkQR', ['bool' => false]);
        } else {
            return view('checkQR', ['bool' => true]);
        }


    }
}
