<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\CompetentionD;
use App\CompetentionsBlock;
use Illuminate\Http\Request;

class CompetentionsController extends Controller
{

    public function index()
    {
        $competentions = CompetentionD::all();
        $competentionsBlock = CompetentionsBlock::all();
        return view('competentions', ['competentions' => $competentions, 'competentionsBlock' => $competentionsBlock]);
        
    }
}
