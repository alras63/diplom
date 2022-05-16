@component('mail::message')

На платформе новая заявка на курс

<p>
    <b>
        Курс:
    </b>
    {{$course->title}}
</p>
<p>
    <b>
        Заявка служебный код:
    </b>
    {{$courseOrder->secret}}
</p>

<h3>
Данные заявки
</h3>

@foreach (json_decode($courseOrder->request_json) as $index=>$polye)
<p>
    <b>
       {{$index}}
    </b>
    {{$polye}}
</p>
@endforeach

<h3>
    Данные пользователя
    </h3>
<p>
    <b>
        ФИО:
    </b>
    {{$user->fio}}
</p>
<p>
    <b>
        Никнейм:
    </b>
    {{$user->name}}
</p>
<p>
    <b>
        Email:
    </b>
    {{$user->email}}
</p>
<p>
    <b>
        Номер телефона:
    </b>
    {{$user->tel}}
</p>
<p>
    <b>
        Служебный ID
    </b>
    {{$user->id}}
</p>


Это автоматическая рассылка с сайта<br>
{{ config('app.name') }}
@endcomponent
