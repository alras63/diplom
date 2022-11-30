<?php

namespace App\Telegram;

use App\Models\PriemEvents;
use App\Models\TgUser;
use WeStacks\TeleBot\Handlers\CommandHandler;

class EventsCommand extends CommandHandler
{
    public function trigger(): bool
    {
        if (!empty($this->update->message->text)
            &&
            preg_match('/^(\/events)/', $this->update->message->text)) {
            return true;
        } else {
            return false;
        }
    }

    public function handle(): void
    {
        try {

            $text = "Выбор доступных мероприятий (при нажатии на кнопку - произойдет запись): ";

            $events = PriemEvents::where('is_active', 1)->get();

            $tgUser = TgUser::whereTgUserId($this->update->user()->id)->first();

            if(isset($tgUser)) {
                $buttons   = [ ];

                foreach ($events as $event) {
                    $buttons[] = [
                        'text'          => $event->name,
                        'callback_data' => '/request_event_' . $event->id
                    ];
                }

                $this->sendMessage([
                    'text'         => $text,
                    'reply_markup' => [
                        'inline_keyboard' => [$buttons]
                    ]
                ]);
            }


        } catch (\Exception $e) {
            $this->sendMessage(['chat_id' => 344878981,
                'text'    => $e->getCode() . ' ' . $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),]);
        }
    }
}
