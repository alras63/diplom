<?php

namespace App\Http\Controllers;

use App\Mail\NewUser;
use App\Models\Courses;
use App\Models\Polya;
use App\Models\Request as ModelsRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
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
        $type = $request->get('type');
        if(!isset($type)) {
            $courses = Courses::all();
        } else {
            $block = CompetentionsBlock::where('slug', $type)->first();

            if(isset($block)) {
                $courses = Courses::where('blocks', 'like', '%' . $block->id . '%')->get();
            } else {
                $courses = Courses::all();
            }
        }

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

    public function orderRegister(Request $request)
    {
        $course_id = $request->course_id;
        $course = Courses::where('id', $course_id)->first();

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

        return view('course.order', ['course' => $course, 'user' => $user ?? NULL, 'polya_list' => $polya_list]);
    }


    public function newInsertCourse(Request $request) {
        if(Auth::guest()) {
            $validate = Validator::make($request->all(), [
                'email' => ['required', 'unique:users']
            ]);

            if ($validate->fails()) {
                if ($validate->fails()) {
                    return Redirect::back();
                }
            }
            $validate = $validate->validated();

        }


        $input = $request->all();
        $uniq_number = $input['_token'];
        $request_polya	 = json_encode($input);
        $status = "Первично подана";
        $course_id = $input['course_id'];
        if($request->isMethod('post') && Auth::guest()) {
            $credentials = $request->only('fio', 'email', 'tel', 'password');

            $f = explode(' ', $request->fio);

            $username = strtolower($this->translit($f[0]) . '-' . abs(crc32(uniqid())));

            $data = ['name' =>  $request->fio, 'username' => $username, "password" => $request->pass, "fio" => $request->fio,  "tel" => $request->tel,  "email" => $request->email];

            $user = $this->createUser($data);
        }

        if(null == $user) {
            $user = Auth::user();
        }

        $user_id = $user->id;
        $courseOrder =ModelsRequest::create([
            'secret' => $uniq_number,
            'request_json' => $request_polya,
            'status' => $status,
            'course_id' => $course_id,
            'user_id' => $user_id
        ]);

        if(!empty($courseOrder)) {
            $moreUsers = [];
            Mail::to('aleksey171002@gmail.com')->cc($moreUsers)->send(new NewOrder($courseOrder));
           return redirect("profile.requests");
        }
    }

    private function translit($value)
    {
        $converter = array(
            'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
            'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
            'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
            'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
            'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
            'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
            'э' => 'e',    'ю' => 'yu',   'я' => 'ya',

            'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
            'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
            'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
            'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
            'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
            'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
            'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',
        );

        $value = strtr($value, $converter);
        return $value;
    }

    private function gen_password($length = 6)
    {
        $password = '';
        $arr = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
            'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
        );

        for ($i = 0; $i < $length; $i++) {
            $password .= $arr[random_int(0, count($arr) - 1)];
        }
        return $password;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'fio' => $data['fio'],
            'username' => $data['name'],
            'name' => $data['username'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'password' => md5($data['password']),
        ]);
    }
}
