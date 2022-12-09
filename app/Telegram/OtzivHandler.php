<?php

namespace App\Telegram;

use App\Models\TgUser;
use WeStacks\TeleBot\Handlers\CommandHandler;


class OtzivHandler extends CommandHandler
{
    public function trigger(): bool
    {
        if (isset($this->update->message->text) && !empty($this->update->message->text)) {
            $tgUser = TgUser::whereTgUserId($this->update->user()->id)->first();

            if (isset($tgUser) && $tgUser->register_step === 8) {
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
                $tgUser->otziv = $this->update->message->text;

                if($tgUser->save()) {
                    $text    = "Спасибо!";
                    $tgUser->register_step = 9;
                    $tgUser->save();
                    $this->sendMessage([
                        'text'                => $text,
                    ]);
                }
            }
        } catch (\Exception $e) {
            $this->sendMessage(['chat_id' => 344878981,
                'text' => $e->getCode() . ' ' . $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),]);
        }
    }
}
