@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="login-page">
                    <div class="card">
                   
                        <form method="POST" action="{{ route('activity.newInsert') }}">
                            <h2 class="title" style="text-align: left">Заявка на мероприятие</h2>


                            <div class="email-login">
                                {{ csrf_field() }}
                                <input type="hidden" name="activity_id" value="{{$request->activity_id}}">
                                @if (isset($polya_list))
                        
                                    @foreach ($polya_list as $polye)
                                        @if (isset($polye))
                                        <label for="{{$polye->english_name}}"> <b>{{$polye->name}}</b></label>
                                        <input id="{{$polye->english_name}}" type="{{$polye->type}}" name="{{$polye->english_name}}" value="{{ old("$polye->english_name") }}" required
                                            autocomplete="{{$polye->english_name}}" autofocus placeholder="Введите значение" required
                                            @error('{{$polye->english_name}}') is-invalid @enderror>
                                        @error('{{$polye->english_name}}')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @endif
                                       
                                    @endforeach
                                @endif




                            </div>

                            <button class="cta-btn">Зарегистрироваться</button>


                        </form>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection
