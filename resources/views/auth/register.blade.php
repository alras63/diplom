@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-page">
                <div class="card">
                    <form method="POST" action="{{ route('register') }}">
                        <h2 class="title">Регистрация</h2>
                    <p class="subtitle">Есть профиль?<a href="{{route('login')}}">Вход</a></p>

                        <p class="or"><span>или</span></p>

                        <div class="email-login">
                            {{ csrf_field() }}

                            <label for="fio"><b>ФИО</b></label>
                            <input placeholder="Введите ФИО" id="fio" type="text" @error('name') is-invalid @enderror name="fio" value="{{ old('fio') }}" required autocomplete="fio" autofocus>

                            @error('fio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="email"> <b>E-mail</b></label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email" placeholder="Введите email" required @error('email')
                                is-invalid @enderror>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="telNumber"><b>Номер телефона</b></label>
                            <input id="telNumber" type="tel" @error('tel') is-invalid @enderror
                                name="tel" required autocomplete="tel" placeholder="Введите номер телефона">

                            @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="pass"><b>Пароль</b></label>
                            <input id="pass" type="password" @error('pass') is-invalid @enderror
                                name="pass" required autocomplete="pass" placeholder="Придумайте пароль">

                            @error('pass')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <label   style="display: flex; align-items: center;">
                        <input id="check_pd" type="checkbox"
                                style="margin-right: 15px"
                                name="check_pd" required>
                        Я даю согласие на обработку своих персональных данных в соответствии с Федеральным законом РФ от 27 июля 2006 г. №152-ФЗ «О персональных данных
                        </label>
                        <button class="cta-btn">Зарегистрироваться</button>
                        Нажимая на кнопку, вы даете согласие на обработку своих персональных данных согласно согласно <a href="https://samgk.ru/about/docs/local_acts/%d0%bf%d0%be%d0%bb%d0%b8%d1%82%d0%b8%d0%ba%d0%b0-%d0%b1%d0%b5%d0%b7%d0%be%d0%bf%d0%b0%d1%81%d0%bd%d0%be%d1%81%d1%82%d0%b8-%d0%bf%d0%b4%d0%bd/" style="color: blue">Политике конфедициальности</a>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection
