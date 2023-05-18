<?php

namespace App\Telegram;

use Symfony\Component\Console\Question\Question;
use WeStacks\TeleBot\Handlers\CommandHandler;

class QuestionCommand extends CommandHandler
{
    public function trigger(): bool
    {
        if (!empty($this->update->message->text)
            &&
            preg_match('/^(\/question)/', $this->update->message->text)) {
            return true;
        } else {
            return false;
        }
    }

    public function handle(): void
    {
        try {

            $text = "Добрый день! Вот список вопросов, которые мы получаем чаще всего: \n\n";

            $questions = Question::where('active', 1)->get();

            $num = 1;

            $buttons   = [ ];


            $line = 0;

            foreach ($questions as $index => $question) {
                if($index % 8 === 0) {
                    $line += 1;
                }

                $text .= "$num. $question->text \n\n";

                $num+=1;

                $buttons[$line][] = [
                    'text'          => $num,
                    'callback_data' => '/request_question_' . $question->id
                ];
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
