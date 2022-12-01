@if($bool === false)
    <img style="width: 100%" src="{{ \Illuminate\Support\Facades\Storage::url('/error.png') }}" alt="ошибка">
@elseif($bool === true)
    <img style="width: 100%" src="{{  \Illuminate\Support\Facades\Storage::url('/true.png') }}" alt="подтверждено">
@endif
