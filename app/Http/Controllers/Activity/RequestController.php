<?php

namespace App\Http\Controllers\Activity;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\ActivityOrder;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Polya;
use Illuminate\Support\Facades\Auth;

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


    public function index(Request $data)
    {

    }

    public function newInsert(Request $request) {
        $input = $request->all();
        $uniq_number = $input['_token'];
        $request_polya	 = json_encode($input);
        $status = "Первично подана";
        $activity_id = $input['activity_id'];
        $user_id = Auth::user()->id;
        $actOrder = ActivityOrder::create([
            'uniq_number' => $uniq_number,
            'request_polya' => $request_polya,
            'status' => $status,
            'activity_id' => $activity_id,
            'user_id' => $user_id
        ]);
       
        if(!empty($actOrder)) {
           return redirect("profile");
        }
    }
    public function new(Request $request)
    {
        $act = Activities::where('id', $request->activity_id)->first();
     
        if(isset($act)) {
            $polya = unserialize($act->polya);
    
            $polya_list = [];
            if(isset($polya)) {
                foreach($polya as $pole) {
  
                    array_push($polya_list, Polya::where('id', $pole)->first());
                } 
            }

            return view('activity.new', ['request'=>$request, 'polya_list' => $polya_list]);

        }
    }

    public function lk(Request $request) {
        $order_uniq = $request->uniq;
        $order_values = ActivityOrder::where("uniq_number", $order_uniq)->first();

        if(isset($order_values) && $order_values != NULL) {
            return view('activity.lk', ['order_uniq'=>$order_uniq, 'order_values' => $order_values]);

        }
        return back();
    }
}
