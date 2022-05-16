@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card_alras login-page" style="max-width: 500px">
            <h3>
                Записаться на курс {{ $course->title }}
            </h3>

            <form action="{{ route('course.newInsertCourse') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="course_id" value="{{ $course->id }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" name="fio" placeholder="ФИО" value="{{ $user->username }}" @if (isset($user->fio))
                readonly
                @endif class="form-control mt-2">
                <input type="text" name="email" placeholder="Email" value="{{ $user->email }}" @if (isset($user->email))
                readonly
                @endif class="form-control mt-2">
                <input type="text" name="phone" placeholder="Номер телефона" value="{{ $user->tel }}" @if (isset($user->tel))
                readonly
                @endif class="form-control mt-2">
                @if (isset($polya_list))

                    @foreach ($polya_list as $polye)
                        @if (isset($polye))
                            <label style="display: flex; align-items: center; margin: 0;">
                                <input style="margin-top: 0 !important; margin-right: 7px !important" id="{{ $polye->english_name }}" type="{{ $polye->type }}"
                                    name="{{ $polye->english_name }}" value="{{ old("$polye->english_name") }}" class="form-control mt-2" @if ($polye->is_required)
                                    required
                                    @endif 
                                    autocomplete="{{ $polye->english_name }}" autofocus placeholder="{{$polye->name}}"
                                    @error('{{ $polye->english_name }}') is-invalid @enderror>

                                    @if ($polye->type == 'checkbox')
                                    {{$polye->name}}
                                        
                                    @endif
                                @error('{{ $polye->english_name }}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        @endif

                    @endforeach
                @endif

                <button type="submit" class="cta-btn">Зарегистрироваться</button>
                Нажимая на кнопку, вы даете согласие на обработку своих персональных данных согласно
            </form>
        </div>
    </div>

@endsection
