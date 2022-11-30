<?php

namespace App\Telegram;

use App\Models\TgUser;
use App\Models\User;
use Carbon\Carbon;
use WeStacks\TeleBot\Handlers\CommandHandler;


class TypeHandler extends CommandHandler
{
    public function trigger(): bool
    {
        if (isset($this->update->callback_query) && !empty($this->update->callback_query) &&
            (
                $this->update->callback_query->data == 'parent'
                ||
                $this->update->callback_query->data == 'child'
            )
        ) {
            return true;
        } else {
            return false;
        }
    }


    public function handle(): void
    {
        try {
            $type        = $this->update->callback_query->data === "parent" ? 1 : 2;

            $user = TgUser::where([
                'tg_user_id' =>  $this->update->user()->id
            ])->first();

            if(null === $user) {
                $user               = new TgUser();
                $user->tg_user_id   = $this->update->user()->id;
                $user->tg_username  = $this->update->user()->username ?? null;
                $user->tg_name      = $this->update->user()->first_name ?? null;
                $user->tg_last_name = $this->update->user()->last_name ?? null;
            }
            $user->user_type = $type;
            $user->register_step = 2;

            $user->save();

            $text    = "Напишите ФИО:";

            $this->sendMessage([
                'text'                => $text,

            ]);


        } catch (\Exception $e) {
            $this->sendMessage(['chat_id' => 344878981,
                'text'    => $e->getCode() . ' ' . $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),]);
        }
    }
}
