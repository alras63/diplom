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

class CourseController extends Controller
{


    public function index(Request $request)
    {
        $course_id = $request->course_id;
        $course = Courses::where('id', $course_id)->first();
        if(!isset($course)) {
            throw new NotFoundHttpException("Такого курса не существует. Если считаете, что это ошибка — обратитесь в поддержку");
        }
        return view('course.page', ['course' => $course]);
    }
    public function list(Request $request)
    {
        $courses = Courses::all();
        $search = $request->input("search");
        // var_dump($search); die();

        if(isset($search)) {
            //  $courses = Courses::search($request->get("search"))->get();
            // var_dump($courses); die();
        };
        if(!isset($courses)) {
            throw new NotFoundHttpException("На платформе нет курсов");
        }
        return view('course.list', ['courses' => $courses]);
    }

    public function order(Request $request)
    {
        $course_id = $request->course_id;
        $course = Courses::where('id', $course_id)->first();
        $user = Auth::user();




        if(!isset($course)) {
            throw new NotFoundHttpException("Такого курса не существует. Если считаете, что это ошибка — обратитесь в поддержку");
        }

        $polya = json_decode($course->polya);

        $polya_list = [];
        if(isset($polya)) {
            foreach($polya as $pole) {

                array_push($polya_list, Polya::where('id', $pole)->first());
            }
        }

        return view('course.order', ['course' => $course, 'user' => $user, 'polya_list' => $polya_list]);
    }


    public function newInsertCourse(Request $request) {
        $input = $request->all();
        $uniq_number = $input['_token'];
        $request_polya	 = json_encode($input);
        $status = "Первично подана";
        $course_id = $input['course_id'];
        $user_id = Auth::user()->id;
        $courseOrder =ModelsRequest::create([
            'secret' => $uniq_number,
            'request_json' => $request_polya,
            'status' => $status,
            'course_id' => $course_id,
            'user_id' => $user_id
        ]);

        if(!empty($courseOrder)) {
            $moreUsers = ['dopobr@samgk.ru'];
            Mail::to('aleksey171002@gmail.com')->cc($moreUsers)->send(new NewOrder($courseOrder));
           return redirect("profile");
        }
    }
}
