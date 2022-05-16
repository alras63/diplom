@component('mail::message')

На платформе новый зарегистрированный пользователь!

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
