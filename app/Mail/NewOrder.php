<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $courseOrder;
    public $user;
    public $course;

    public function __construct($courseOrder)
    {
        $this->courseOrder = $courseOrder;
        $user = \App\User::where(['id' => $this->courseOrder->user_id])->first();
        $course = \App\Course::where(['id' => $this->courseOrder->course_id])->first();

        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $courseTitle = $this->course->title;
        $user = $this->user;
        return $this->subject("Пользователь $user->fio записался на курс $courseTitle")->markdown('emails.orders');
    }
}
