<?php

namespace App\Telegram;

use App\Models\PriemEvents;
use App\Models\PriemEventsRequests;
use App\Models\TgUser;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use WeStacks\TeleBot\Handlers\CommandHandler;


class EventRequestHandler extends CommandHandler
{
    public function trigger(): bool
    {
        if (isset($this->update->callback_query) && !empty($this->update->callback_query) &&
            preg_match('/(\/request_event_)(\d+)/', $this->update->callback_query->data)) {
            return true;
        } else {
            return false;
        }
    }


    public function handle(): void
    {
        try {
            $tgUser = TgUser::whereTgUserId($this->update->user()->id)->first();

            $parse = null;
            preg_match('/(\/request_event_)(\d+)/', $this->update->callback_query->data, $parse);
            $parseEventId  = $parse[2];
            $event  = PriemEvents::whereId($parse[2])->first();

            if(isset($tgUser)) {
                $eventRequest = PriemEventsRequests::where([
                    'tg_user_id' => (int)$tgUser->id,
                    'is_active' => 1,
                ])->first();

                if(null == $eventRequest) {
                    $eventRequest = new PriemEventsRequests();
                    $eventRequest->tg_user_id = $tgUser->id;
                    $eventRequest->priem_event_id = $parseEventId;
                    $eventRequest->uniq = Str::random(15);

                    $eventRequest->save();

                    $image = QrCode::format('png')->size(500)->generate(env('APP_URL') . '/checkQR/' . $eventRequest->uniq);

                    Storage::put('/public/qrs/' . $eventRequest->uniq . '.png', $image);
                    $path = env('APP_URL') .  "/storage/qrs/$eventRequest->uniq.png";

                    $this->sendMessage([
                        'text'         => "Вы успешно записались, покажите QR на входе, в день мероприятия",
                    ]);

                    $this->sendPhoto([
                        'photo' => Storage::path('/public/qrs/' . $eventRequest->uniq . '.png'),

                    ]);
                } else {
                    if($eventRequest->id == $parseEventId) {
                        $this->sendMessage([
                            'text'         => "Вы выбрали тоже самое мероприятие!",
                        ]);
                    } else {
                        $eventRequest->is_active = 0;
                        $eventRequest->save();

                        $eventRequest = new PriemEventsRequests();
                        $eventRequest->tg_user_id = $tgUser->id;
                        $eventRequest->priem_event_id = $parseEventId;
                        $eventRequest->uniq = Str::random(15);

                        $eventRequest->save();

                        $image = QrCode::format('png')->size(500)->generate(env('APP_URL') . '/checkQR/' . $eventRequest->uniq);
                        Storage::put('/public/qrs/' . $eventRequest->uniq . '.png', $image);

                        $this->sendMessage([
                            'text'         => "Вы успешно перезаписались, покажите QR на входе, в день мероприятия. АДРЕС: $event->address",
                        ]);

                        $this->sendPhoto([
                            'photo' => Storage::path('/public/qrs/' . $eventRequest->uniq . '.png'),

                        ]);
                    }


                }
            }


        } catch (\Exception $e) {
            $this->sendMessage(['chat_id' => 344878981,
                'text'    => $e->getCode() . ' ' . $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),]);
        }
    }
}
