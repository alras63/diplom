@extends('layouts.app')

@section('content')
    <div class="kadr-wrap">
        <div class="container">
            <div class="mainblock">
                <h1>
                    <span class="green">
                        Кадровый резерв
                    </span>
                    <br>
                    Самарской области
                </h1>

                <div class="btns">
                    <a href="{{route('login')}}" class="btn-skos btn-fill"><span>вход</span> </a>
                    <a href="{{route('register')}}" class="btn-skos btn-border"><span>регистрация</span></a>
                </div>

                <div class="logos">
                    <a href="#">
                        <img src="{{ asset('images/admgub.png') }}" alt="Лого">

                    </a>
                    <a href="#">
                        <img src="{{ asset('images/depkadr.png') }}" alt="Лого">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/tavolga.png') }}" alt="Лого">
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
