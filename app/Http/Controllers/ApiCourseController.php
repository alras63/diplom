<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Polya;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Mail\NewOrder;
use Illuminate\Support\Facades\Mail;
use App\CompetentionD;
use App\CompetentionsBlock;
use Illuminate\Support\Facades\DB;

class ApiCourseController extends Controller
{

    public function list(Request $request)
    {
        $params = $request->input();

        if(!isset($params)) {
            $courses = Courses::all();
        } else {
            $courses = DB::table('courses');
            foreach($params as $param=>$value) {
                $courses->where($param, $value);
            }
            $courses = $courses->get();
        }


        if(!isset($courses)) {
            return Response::json(['На платформе нет курсов'], 404);
        }
        return ['courses' => $courses];
    }

    public function filter(Request $request) {
        $polyas = ["comp_id", "for_type"];
        return $polyas;
        // return $courses;

    }
}
