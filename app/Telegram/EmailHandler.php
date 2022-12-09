<?php

namespace App\Telegram;

use App\Models\PriemEvents;
use App\Models\TgUser;
use WeStacks\TeleBot\Handlers\CommandHandler;


class EmailHandler extends CommandHandler
{
    public function trigger(): bool
    {
        if (isset($this->update->message->text) && !empty($this->update->message->text)) {
            $tgUser = TgUser::whereTgUserId($this->update->user()->id)->first();

            if (isset($tgUser) && $tgUser->register_step === 6) {
                return true;
            }

            return false;
        } else {
            return false;
        }
    }


    public function handle(): void
    {
        try {
            $tgUser = TgUser::whereTgUserId($this->update->user()->id)->first();

            if (null !== $tgUser) {
                $tgUser->email = $this->update->message->text;

                if($tgUser->save()) {
                    $tgUser->register_step = 7;
                    $tgUser->save();
                    $text = "Выбор доступных мероприятий /events (при нажатии на кнопку - произойдет запись, при повторной записи - предыдущая отменится!): \n";

                    $events = PriemEvents::where('is_active', 1)->get();

                    foreach ($events as $index => $event) {
                        $num = $index+1;
                        $text .= "$num. $event->name \n";
                    }

                    $tgUser = TgUser::whereTgUserId($this->update->user()->id)->first();

                    if(isset($tgUser)) {
                        $buttons = [];

                        $line = 0;
                        foreach ($events as $index => $event) {
                            if ($index % 8 === 0) {
                                $line += 1;
                            }

                            $buttons[$line][] = [
                                'text' => $index + 1,
                                'callback_data' => '/request_event_' . $event->id
                            ];
                        }

                        $inlineKb = [];

                        foreach ($buttons as $line) {
                            $inlineKb[] = $line;
                        }


                        $this->sendMessage([
                            'text' => $text,
                            'reply_markup' => [
                                'inline_keyboard' => $inlineKb
                            ]
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            $this->sendMessage(['chat_id' => 344878981,
                'text' => $e->getCode() . ' ' . $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),]);
        }
    }
}
