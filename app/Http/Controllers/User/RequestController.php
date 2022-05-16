<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Request;
use App\Models\Courses;

class RequestController extends Controller
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
    public function index(Request $data)
    {

    }
}
