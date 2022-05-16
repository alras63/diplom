<?php

namespace App\Http\Controllers\User;

use App\CoursePay;
use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Lessons;
use App\Models\LessonsContent;
use App\Models\Practice;
use App\Models\Request as ModelsRequest;
use App\Models\UserLessonComplete;
use App\Models\UserPracticalComplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class PlatformController extends Controller
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
    public function index(Request $request)
    {

        $course = Courses::where('id', $request->course_id)->first();
        $course_pay = CoursePay::where('user_id', \Auth::User()->id)->where('course_id', $course->id)->first();
        if(isset($course_pay) && $course_pay !== null) {
            $modules = $course->modules;
            $lesson_id = null;
    
            $active_lesson = $this->getActiveLesson($modules);
         
    
            if(isset($active_lesson) && $active_lesson != '') {
    
                return view('platform', ['course'=> $course, 'modules'=> $modules,  'active_lesson' => $lesson_id]);
            } else {
                return view('platform', ['course'=> $course, 'modules'=> $modules, 'lessonfc' => $active_lesson, ]);
    
            }
        }
        $error = (object)[];
        $error->type = "step";
        $error->text = "К сожалению, Вы не можете изучить материалы данного курса. Дождитесь подтверждения заявки администратором";
        return view('platform', ['error'=> $error->type, 'text' => $error->text]);
        

        // abort(403);
      
    }

    private function getActiveLesson($modules) {

        foreach($modules as $module) {
            $course = $module->course;
        
            $course_pay = CoursePay::where('user_id', \Auth::User()->id)->where('course_id', $course->id)->first();
            if(isset($course_pay) && $course_pay !== null) {
            $lessons_a = [];
            foreach($module->lessons as $lesson) {
                $lesson_complete = $lesson->isComplete(Auth::user()->id);
                array_push($lessons_a, $lesson->id);
                if($lesson_complete) {
                    $lesson_id =  $lesson->id;
                    $active_lesson = Lessons::where('id', $lesson_id)->first();
                    return $active_lesson;
                } else {
                    return $lessons_a[0];
                }
            }
        } else {
            abort(403);
        }
           
        }

        
    }
    public function module(Request $request)
    {
        // foreach (Auth::user()->requests as $index => $request) {
        //     $request = ModelsRequest::where('id', $request->id)->first();
        //     var_dump($request->course);
        // }

        $course = Courses::where('id', $request->course_id)->first();
    
        $modules = $course->modules;
        $active_lesson = $this->getActiveLesson($modules);
        $lessonIds = $course->lessonids();
      
        $firstLesson = $lessonIds[0];
        $endlesson = end($lessonIds);
        $endlessonComplete = UserLessonComplete::where('user_id', Auth::user()->id)->where('lesson_id', $endlesson)->first();
        $index_id = array_search($request->lesson_id, $lessonIds);
        if(isset($lessonIds[$index_id-1])) {
            $lessonBeforeId = $lessonIds[$index_id-1];

        } else {
            $lessonBeforeId = $lessonIds[$index_id];

        }
        if(isset( $lessonIds[$index_id+1])) {
            $lessonAfterId = $lessonIds[$index_id+1];

        }else {
            $lessonAfterId = $lessonIds[$index_id];

        }
        if(!$request->lesson_id) {
            $lesson_id = $firstLesson;
        }
        
        if($request->lesson_id != $firstLesson) {
           

            // var_dump($lessonBeforeId);
            $userLessonComplete = UserLessonComplete::where('user_id', Auth::user()->id)->where('lesson_id', $lessonBeforeId)->first();
            if(!$userLessonComplete) {
                $error = (object)[];
                $error->type = "step";
                $error->text = "К сожалению, Вы не можете изучить материалы данной лекции. <br> Вероятно, Вы не прошли предыдущую лекцию (нужно нажать на кнопку 'Пройти лекцию'). Если вы считаете, что произошла ошибка – обратитесь в техническую поддержку";
                return view('platform', ['error'=> $error->type, 'text' => $error->text]);
            }
        }
       
        $lesson = Lessons::where('id', $request->lesson_id)->first();
        
        if(isset($lesson) && $lesson != NULL) {
            $course_id = $lesson->module->course->id;
            $module_id = $lesson->module->id;
    
            if($course_id != $request->course_id) {
                abort(403, 'Access denied');
                
            }
        }
        
     
        return view('platform', ['type'=>'module', 'course'=> $course, 'modules'=> $modules, 'lessonfc' => $lesson]);
    }
    public function lesson(Request $request)
    {
        $course = Courses::where('id', $request->course_id)->first();
    
        $modules = $course->modules;
        $active_lesson = $this->getActiveLesson($modules);
        $lessonIds = $course->lessonids();
      
        $firstLesson = $lessonIds[0];
        $endlesson = end($lessonIds);
        $endlessonComplete = UserLessonComplete::where('user_id', Auth::user()->id)->where('lesson_id', $endlesson)->first();
        $index_id = array_search($request->lesson_id, $lessonIds);
        if(isset($lessonIds[$index_id-1])) {
            $lessonBeforeId = $lessonIds[$index_id-1];

        } else {
            $lessonBeforeId = $lessonIds[$index_id];

        }
        if(isset( $lessonIds[$index_id+1])) {
            $lessonAfterId = $lessonIds[$index_id+1];

        }else {
            $lessonAfterId = $lessonIds[$index_id];

        }
        if(!$request->lesson_id) {
            $lesson_id = $firstLesson;
        }
        
        if($request->lesson_id != $firstLesson) {
           

            // var_dump($lessonBeforeId);
            $userLessonComplete = UserLessonComplete::where('user_id', Auth::user()->id)->where('lesson_id', $lessonBeforeId)->first();
            if(!$userLessonComplete) {
                $error = (object)[];
                $error->type = "step";
                $error->text = "К сожалению, Вы не можете изучить материалы данной лекции. <br> Вероятно, Вы не прошли предыдущую лекцию (нужно нажать на кнопку 'Пройти лекцию'). Если вы считаете, что произошла ошибка – обратитесь в техническую поддержку";
                return view('platform', ['error'=> $error->type, 'text' => $error->text]);
            }
        }
       
        $lesson = Lessons::where('id', $request->lesson_id)->first();
        if($lesson) {
            $course_id = $lesson->module->course->id;
            $module_id = $lesson->module->id;
    
            if($course_id != $request->course_id) {
                abort(403, 'Access denied');
                
            }
         
            
                return view('platform', ['course'=> $course, 'modules'=> $modules, 'lessonfc' => $lesson, 'active_lesson' => $active_lesson]);
        }
      
 
   
        
    }

    public function practice(Request $request)
    {

        $course = Courses::where('id', $request->course_id)->first();
    
        $modules = $course->modules;
        $active_lesson = $this->getActiveLesson($modules);
        $lessonIds = $course->lessonids();
      
        $firstLesson = $lessonIds[0];
        $endlesson = end($lessonIds);
        $endlessonComplete = UserLessonComplete::where('user_id', Auth::user()->id)->where('lesson_id', $endlesson)->first();
        $index_id = array_search($request->lesson_id, $lessonIds);
        if(isset($lessonIds[$index_id-1])) {
            $lessonBeforeId = $lessonIds[$index_id-1];

        } else {
            $lessonBeforeId = $lessonIds[$index_id];

        }

        if(isset( $lessonIds[$index_id+1])) {
            $lessonAfterId = $lessonIds[$index_id+1];

        }else {
            $lessonAfterId = $lessonIds[$index_id];

        }
        
        if(!$request->lesson_id) {
            $lesson_id = $firstLesson;
        }
        
        if($request->lesson_id != $firstLesson) {
           

            // var_dump($lessonBeforeId);
            $userLessonComplete = UserLessonComplete::where('user_id', Auth::user()->id)->where('lesson_id', $lessonBeforeId)->first();
            if(!$userLessonComplete) {
                $error = (object)[];
                $error->type = "step";
                $error->text = "К сожалению, Вы не можете изучить материалы данной лекции. <br> Вероятно, Вы не прошли предыдущую лекцию (нужно нажать на кнопку 'Пройти лекцию'). Если вы считаете, что произошла ошибка – обратитесь в техническую поддержку";
                return view('platform', ['error'=> $error->type, 'text' => $error->text]);
            }
        }
       
        $lesson = Lessons::where('id', $request->lesson_id)->first();
     
        $course_id = $lesson->module->course->id;
        $module_id = $lesson->module->id;

        if($course_id != $request->course_id) {
            abort(403, 'Access denied');
            
        }

        $prct = Practice::where("id", $request->practice_id)->first();
        return view('platform', ['course'=> $course, 'modules'=> $modules, 'lessonfc' => $lesson, 'type'=>'practice', 'practice' => $prct]);
    }

    public function practicesave(Request $request) {
        if($request->file('file')) {
            $path = $request->file('file')->storeAs(
                'file_practice_as_id/' . time() * rand(1, 999), $request->file('file')->getClientOriginalName());
            if(!UserPracticalComplete::where("user_id",  $request->user_id)->where("practical_id", $request->practical_id)->first()) {
                $prcompltl = UserPracticalComplete::create([
                    'user_id' => $request->user_id,
                    'practical_id' =>  $request->practical_id,
                    'file' => $path,
                    'comment' => $request->comment,
                    'complete_status' => '1'
                ]);
            } else {
                $error = (object)[];
                    $error->type = "already_exist";
                    $error->text = "К сожалению, Вы уже загружали результат практической работы";
                    return view('platform', ['error'=> $error->type, 'text' => $error->text]);
            }
        } else {
            $error = (object)[];
            $error->type = "file_not_found";
            $error->text = "К сожалению, Вы не прикрепили файл. Это обязательное поле";
            return view('platform', ['error'=> $error->type, 'text' => $error->text]);   
        }
       
       
    }

    public function lessonsave(Request $request) {
        if(!UserLessonComplete::where("user_id",  Auth::user()->id)->where("lesson_id", $request->lesson_id)->first()) {
            $lessoncmplt = UserLessonComplete::create([
                'user_id' => Auth::user()->id,
                'lesson_id' =>  $request->lesson_id,
                'complete_status' => '1'
            ]);
            return back();

        } else {
            $error = (object)[];
                $error->type = "already_exist";
                $error->text = "К сожалению, Вы уже проходили эту лекцию. Переходите к следующей";
                return view('platform', ['error'=> $error->type, 'text' => $error->text]);
        }
    }

}
