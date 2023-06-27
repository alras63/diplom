<?php

namespace App\Telegram;

use App\Models\QuestionTg;
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
            $text .= "Этот бот создан для информирования абитуриентов \n\n";
//            $text .= "Для взаимодействия с ботом, расскажите нам о себе:";
//            $this->sendMessage([
//                'text'         => $text
//            ]);
//
//            $text      = "💬 Ваша роль: ";
//            $buttons   = [
//                [
//                    'text'          => "Я - родитель",
//                    'callback_data' => 'parent',
//                ],
//                [
//                    'text'          => "Я - абитуриент",
//                    'callback_data' => 'child',
//                ],
//
//            ];
//            $this->sendMessage([
//                'text'         => $text,
//                'reply_markup' => [
//                    'inline_keyboard' => [$buttons]
//                ]
//            ]);

            $text .= "Вот список вопросов, которые мы получаем чаще всего. Чтобы обновить список, введите команду /question \n\n";

            $questions = QuestionTg::where('active', 1)->get();

            $num = 1;

            $buttons   = [ ];


            $line = 0;

            foreach ($questions as $index => $question) {
                if($index % 8 === 0) {
                    $line += 1;
                }

                $text .= "$num. $question->text \n\n";



                $buttons[$line][] = [
                    'text'          => $num,
                    'callback_data' => '/request_question_' . $question->id
                ];

                $num+=1;
            }

            $inlineKb = [];

            foreach ($buttons as $line) {
                $inlineKb[] = $line;
            }


            $this->sendMessage([
                'text'         => $text,
                'reply_markup' => [
                    'inline_keyboard' => $inlineKb
                ]
            ]);

        } catch (\Exception $e) {
            $this->sendMessage(['chat_id' => 344878981,
                'text'    => $e->getCode() . ' ' . $e->getMessage() . " " . $e->getLine() . " " . $e->getFile(),]);
        }
    }
}
