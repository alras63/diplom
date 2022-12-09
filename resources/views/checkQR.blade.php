@if($bool === false)
    <img style="width: 100%" src="{{ \Illuminate\Support\Facades\Storage::url('/error.png') }}" alt="ошибка">
@elseif($bool === true && isset($priemRequest))
    <img style="width: 100%" src="{{  \Illuminate\Support\Facades\Storage::url('/true.png') }}" alt="подтверждено">
    <h2 style="font-size: 40px">
        {{isset($priemRequest->tguser) ? "Проверьте ФИО в паспорте: " . $priemRequest->tguser->fio : "ФИО не указано"}}


    </h2>
    <br>
    <br>
    <h2 style="font-size: 60px">
        {{isset($priemRequest->tgevent) ? $priemRequest->tgevent->name : "Нет записи" }}
    </h2>
@endif
