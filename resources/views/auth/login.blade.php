@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="login-page">
                    <div class="card">
                        <form method="POST" action="{{ route('login') }}">
                            <h2 class="title">Вход в личный кабинет</h2>
                            <p class="subtitle">Нет профиля?<a href="#"> Регистрация</a></p>

                            <p class="or"><span>или</span></p>

                            <div class="email-login">
                                {{ csrf_field() }}
                                <label for="email"> <b>E-mail</b></label>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus placeholder="Введите email" required @error('email')
                                    is-invalid @enderror>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="psw"><b>Пароль</b></label>
                                <input id="password" type="password" @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password" placeholder="Введите пароль">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                {{-- <div style="display: flex; align-items: center;">
                                    <input style="margin-right: 10px" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember" style="margin-bottom: 0">
                                        {{ __('Запомнить меня') }}
                                    </label>
                                </div> --}}

                            </div>
                        <label   style="display: flex; align-items: center;">
                        <input id="check_pd" type="checkbox"
                                style="margin-right: 15px"
                                name="check_pd" required>
                        Я даю согласие на обработку своих персональных данных в соответствии с Федеральным законом РФ от 27 июля 2006 г. №152-ФЗ «О персональных данных
                        </label>
                            <button class="cta-btn">Войти</button>
                               Нажимая на кнопку, вы даете согласие на обработку своих персональных данных согласно согласно <a href="https://samgk.ru/about/docs/local_acts/%d0%bf%d0%be%d0%bb%d0%b8%d1%82%d0%b8%d0%ba%d0%b0-%d0%b1%d0%b5%d0%b7%d0%be%d0%bf%d0%b0%d1%81%d0%bd%d0%be%d1%81%d1%82%d0%b8-%d0%bf%d0%b4%d0%bd/" style="color: blue">Политике конфедициальности</a>
                            {{-- <a class="forget-pass" href="#">Забыли пароль?</a> --}}
                        </form>
                    </div>
                </div>


                


            </div>
        </div>
    </div>
@endsection
