<?php

namespace App\Http\Controllers;

use App\Models\PriemEventsRequests;
use Illuminate\Support\Facades\Auth;
use WeStacks\TeleBot\Laravel\TeleBot;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
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
        $priemRequest = PriemEventsRequests::where('uniq', '=', $uniq)->where('is_active', '=', 1)->with(PriemEventsRequests::REL_TGUSER)->with(PriemEventsRequests::REL_TGEVENT)->first();

        if (null === $priemRequest) {
            return view('checkQR', ['bool' => false]);
        } else {
            $priemRequest->visited = 1;
            $priemRequest->save();
            return view('checkQR', ['bool'         => true,
                                    'priemRequest' => $priemRequest]);
        }


    }

    public function sendNap()
    {
        if (Auth::check()) {
            $priemRequests = PriemEventsRequests::where('is_active', '=', 1)->with(PriemEventsRequests::REL_TGUSER)->with(PriemEventsRequests::REL_TGEVENT)->get();

            if (null !== $priemRequests) {
                foreach ($priemRequests as $priemRequest) {
                    $text = "Добрый день, " . ($priemRequest->tguser->fio ?? 'абитуриент') . "! \n\n";
                    $text .= "Напоминаем о том, что вы записывались на мастер-класс \n\n" . ($priemRequest->tgevent->name ?? ' ') . "\n\n в рамках мероприятия 'День открытых дверей 10 декабря' \n\n";
                    $text .= "Мастер-класс состоится 10 декабря в 10:00 по адресу " . ($priemRequest->tgevent->address) . ". \n\n На входе покажите индивидуальный QR-код, подтверждающий запись!";
                    TeleBot::sendMessage(['chat_id' => $priemRequest->tguser->tg_user_id,
                                          'text'    => $text,
                    ]);
                }

            }
        }


    }
}
