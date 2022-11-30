<?php

namespace App\Telegram;

use WeStacks\TeleBot\Handlers\CommandHandler;

class StartCommand extends CommandHandler
{
    public function trigger(): bool
    {
        if (!empty($this->update->message->text)
            &&
            preg_match('/^(\/start)/', $this->update->message->text)) {
            return true;
        } else {
            return false;
        }
    }

    public function handle(): void
    {
        try {

            $text = "Добрый день! Рады вас приветствовать в ведущем колледже Самарской области 💯 \n\n";
            $text .= "Этот бот создан для информирования абитуриентов и записи на мероприятия - дни открытых дверей, мастер-классы... \n\n";
            $text .= "Для взаимодействия с ботом, расскажите нам о себе:";
            $this->sendMessage([
                'text'         => $text
            ]);

            $text      = "💬 Ваша роль: ";
            $buttons   = [
                [
                    'text'          => "Я - родитель",
                    'callback_data' => 'parent',
                ],
                [
                    'text'          => "Я - абитуриент",
                    'callback_data' => 'child',
                ],

            ];
            $this->sendMessage([
                'text'         => $text,
                'reply_markup' => [
                    'inline_keyboard' => [$buttons]
                ]
            ]);

        } catch (\Exception $e) {
            $this->sendMessage(['chat_id' => 344878981,
                'text'    => $e->getCode() . ' ' . $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),]);
        }
    }
}
