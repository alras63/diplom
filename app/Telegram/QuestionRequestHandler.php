<?php

namespace App\Telegram;

use App\Models\PriemEvents;
use App\Models\PriemEventsRequests;
use App\Models\QuestionTg;
use App\Models\TgUser;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use WeStacks\TeleBot\Handlers\CommandHandler;


class QuestionRequestHandler extends CommandHandler
{
    public function trigger(): bool
    {
        if (isset($this->update->callback_query) && !empty($this->update->callback_query) &&
            preg_match('/(\/request_question_)(\d+)/', $this->update->callback_query->data)) {
            return true;
        } else {
            return false;
        }
    }


    public function handle(): void
    {
        try {
            $parse = null;
            preg_match('/(\/request_question_)(\d+)/', $this->update->callback_query->data, $parse);
            $event  = QuestionTg::whereId($parse[2])->first();

            $answer = $event->answer;

            $this->sendMessage([
                'text'         => $answer
            ]);


        } catch (\Exception $e) {
            $this->sendMessage(['chat_id' => 344878981,
                'text'    => $e->getCode() . ' ' . $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),]);
        }
    }
}
