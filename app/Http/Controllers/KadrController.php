<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KadrController extends Controller
{


    public function index()
    {
        return view('kadr.index');
    }

    public function competentions() {
        return view('kadr.competentions');
    }

    public function competentionslist() {
        return ['HTML' => '#', 'CSS'=>'#', 'Javascript'=>"#"];
    }
}
