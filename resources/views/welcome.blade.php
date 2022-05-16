{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
        }

    </style>
    {{-- <link href="{{ asset('css/app-tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components-v2.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components-v2.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/sly.min.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style> --}}
{{-- </head> --}}
@extends('layouts.app')

@section('content')
<body class="antialiased">
    {{-- <header class="bg-gray-200">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
            <div class="w-full py-1 flex items-center justify-between border-b border-indigo-500 lg:border-none">
                <div class="flex items-center logo text-white">
                    <a href="{{ route('/') }}">
                        <img src="{{ asset('images/logo.svg') }}" alt="Логотип">
                        <div class="logo-text text-white">
                            Модуль дополнительного образования
                        </div>
                    </a>
                    <div class="hidden ml-10 space-x-8 lg:block">
                        <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> О платформе </a>

                        <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> Важные документы </a>
                    </div>
                </div>
                
                <div class="py-4 flex flex-wrap justify-center space-x-6 lg:hidden">
                    <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> О платформе </a>

                    <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> Важные документы </a>

                </div>

                <div class="ml-10 space-x-4">
                    <a href="#"
                        class="inline-block bg-indigo-500 py-2 px-4 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-75">Войти</a>
                    <a href="#"
                        class="inline-block bg-white py-2 px-4 border border-transparent rounded-md text-base font-medium text-indigo-600 hover:bg-indigo-50">Зарегистрироваться</a>
                </div>

            </div>
        </nav>
    </header> --}}

    {{-- <header>
        <div class="container">
            <div class="d-flex">
                <div class="logo">
                    <a href="{{ route('/') }}">
                        <img src="{{ asset('images/logo.svg') }}" alt="Логотип">
                        <div class="logo-text">
                            Модуль дополнительного образования
                        </div>
                    </a>
                </div>
                <nav>
                    <ul>
                        <li><a href="#">О платформе</a></li>
                        <li><a href="#">Важные документы</a></li>
                    </ul>
                </nav>
                <a href="#" class="btn_r green-btn">Заказать звонок</a>
                <div class="underheader"
                    style="display: inline-flex; min-height: 30px; background-color: #BFEACC; border-radius: 100px;">
                    <div class="user-menu" style="justify-self: flex-end; display: flex; justify-content: center;">
                        @auth
                            <a href="{{ route('profile') }}" class="btn btn-link"
                                style="color: #000; font-size: 11px">Профиль</a>
                            {!! Form::open(['method' => 'POST', 'route' => 'logout']) !!}
                            <button type="submit" class="btn btn-link" style="color: #000; font-size: 11px">Выход</button>
                            {!! Form::close() !!}

                        @endauth
                        @guest
                            <a href="{{ route('register') }}" class="btn btn-link"
                                style="color: #000; font-size: 11px">Регистрация</a>
                            <a href="{{ route('login') }}" class="btn btn-link"
                                style="color: #000; font-size: 11px">Вход</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>


    </header> --}}


    {{-- <div class="container-fluid">
        <section class="main">
            <div class="container">
                <div class="d-flex">
                    <div class="maintext">
                        <h1>
                            Цифровая образовательная платформа
                        </h1> --}}

    {{-- <div class="napr">
                            <h2>
                                Курсы проводятся по направлениям:
                            </h2>

                            <div class="napr-list">
                                <a href="#" class="napr-item">IT и разработка</a>
                                <a href="#" class="napr-item">Преподавание</a>
                                <a href="#" class="napr-item">Дизайн</a>
                                <a href="#" class="napr-item">Маркетинг и продвижение</a>
                                <a href="#" class="napr-item">Управление и психология</a>
                                <a href="#" class="napr-item">Ворлдскиллс Россия</a>
                                <a href="#" class="napr-item all">Другие направления</a>
                            </div>
                        </div> --}}
    {{-- </div>

                    <div>
                        <div class="svgmask">
                            <video id="video" style="width:100%; height:100%; object-fit: cover;" autoplay muted loop>
                                <source src="{{ asset('videos/video.mp4') }}" type='video/mp4'>
                            </video>
                        </div>
                        <svg width="575" height="517" viewBox="0 0 575 517" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <clipPath id="myClip">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M574.639 270.06C568.176 336.433 478.614 355.541 430.729 401.984C393.987 437.62 375.426 493.245 327.099 510.148C278.39 527.186 225.429 509.325 177.338 490.613C131.634 472.83 91.5542 444.941 60.9889 406.608C29.2543 366.808 6.07542 320.744 1.47997 270.06C-3.43359 215.868 2.98323 158.649 34.4824 114.266C66.1608 69.6301 119.769 49.4282 171.265 30.8276C224.492 11.6022 280.834 -10.7275 334.983 5.72479C389.551 22.3045 420.08 75.8224 458.376 118.062C502.298 166.507 580.975 204.993 574.639 270.06Z"
                                    fill="#C4C4C4" />
                            </clipPath>
                        </svg>

                    </div>

                </div>

            </div>
        </section>
    </div> --}}

    <section id="catalog_courses">
        <div class="max-w-screen-xl mx-auto">
            <div class="d-flex items-start" style="max-height: 330px">
                <div class="rounded-lg  d-flex items-center flex-shrink-0 mr-4" style="width: 70%; background-image: linear-gradient(120deg, #5eb1ff 0%, #66a6ff 100%);">
                    <div class="p-6 flex-shrink-0" style="width: 45%">
                        <h1 class="text-2xl text-white font-semibold">
                            Программы ПО и ДПО <br> от ведущего колледжа Самары
                        </h1>
                        <p  class="text-white font-normal mt-2">
                            Дополнительное образование по самым разным направлениям для всех категорий граждан в Самарском государственном колледже! Различные графики и формы обучения
                        </p>
                    </div>
                    <div style="height: 100%">
                        <img src="{{ asset('images/image-block.png') }}" alt="Картинка">
                    </div>
                    
                </div>
                <div class="cards d-flex flex-col justify-between items-stretch pr-2" style="width: 100%; height: 100%; max-height: 330px; overflow-y: scroll">
                    @for ($i = 0; $i < count($courses) && $i < 3; $i++)

                  
                   
                    <a href="{{ route('course.page', $courses[$i]->id) }}" style="text-decoration: none !important" class="card py-6 px-6 mb-2">
                        <h3 class="text-lg text-dark font-semibold">{{$courses[$i]->title}}</h3>
                        <p>
                            {{$courses[$i]->description}}
                        </p>
                    </a>
                  
                    @endfor
                  
                </div>
            </div>
           

            <div class="d-flex">
                {{-- <div class="catalog-wrap"> --}}
                {{-- <h3 class="catalog-title">
                        Каталог открытых курсов
                    </h3> --}}

                {{-- <div class="catalog-list">
                        <div class="catalog-item">
                            <div class="icon open">

                            </div>
                            <div>
                                <div class="title">
                                    Бесплатные курсы
                                </div>
                                <div class="description">
                                    Вы можете подать заявку и сразу же получите доступ
                                </div>
                            </div>
                        </div>
                        <div class="catalog-item">
                            <div class="icon">

                            </div>
                            <div>
                                <div class="title">
                                    Платные курсы
                                </div>
                                <div class="description">
                                    Вы получите доступ после оплаты и подтверждения заявки модератором
                                </div>
                            </div>

                        </div>
                        <div class="catalog-item">
                            <div class="icon">

                            </div>
                            <div>
                                <div class="title">
                                    Программы ПК
                                </div>
                                <div class="description">
                                    Повысить квалификацию онлайн, на нашей платформе
                                </div>
                            </div>

                        </div>
                        <div class="catalog-item">
                            <div class="icon">

                            </div>
                            <div>
                                <div class="title">
                                    Программы ПП
                                </div>
                                <div class="description">
                                    Пройти профессиональную переподготовку онлайн, на нашей платформе
                                </div>
                            </div>

                        </div>
                        <div class="catalog-item">
                            <div class="icon">

                            </div>
                            <div>
                                <div class="title">
                                    Общеобразовательные курсы
                                </div>
                                <div class="description">
                                    Получить знания и навыки по востребованным на рынке компетенциям
                                </div>
                            </div>

                        </div>
                        <div class="catalog-item">
                            <div class="icon">

                            </div>
                            <div>
                                <div class="title">
                                    Подготовительные курсы
                                </div>
                                <div class="description">
                                    Абитуриент? Этот раздел – для тебя!
                                </div>
                            </div>

                        </div>
                    </div> --}}
                {{-- </div> --}}
              

            </div>
    </section>


    <section id="advantages">
        <div class="max-w-screen-xl mx-auto">
            <h2 class="section-title text-xl font-bold" >
                Преимущества нашей Платформы
            </h2>

            <div class="advantages-list">
                <div class="adventages-item">
                    <div class="icon">
                        <img src="{{ asset('images/a1.png') }}" alt="Преимущества">
                    </div>
                    <div class="content">
                        <div class="title">
                            ОФИЦИАЛЬНАЯ ПЛАТФОРМА
                        </div>
                        <div class="description">
                            Все доументы - в порядке!
                        </div>
                    </div>
                </div>
                <div class="adventages-item">
                    <div class="icon">
                        <img src="{{ asset('images/a2.png') }}" alt="Преимущества">
                    </div>
                    <div class="content">
                        <div class="title">
                            НАСТАВНИКИ-ОРГАНИЗАТОРЫ
                        </div>
                        <div class="description">
                            С большим стажем работы и огромным количеством знаний и навыков
                        </div>
                    </div>
                </div>
                <div class="adventages-item">
                    <div class="icon">
                        <img src="{{ asset('images/a3.png') }}" alt="Преимущества">
                    </div>
                    <div class="content">
                        <div class="title">
                            БЕСПЛАТНО
                        </div>
                        <div class="description">
                            Регистрация на платформе полностью бесплатная
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <footer>
        <div class="max-w-screen-xl mx-auto">
            <div class="d-flex">
                <div class="logo">
                    <a href="{{ route('/') }}">
                        <img src="{{ asset('images/logo.svg') }}" alt="Логотип">
                        <div class="logo-text">
                            Модуль <br> дополнительного <br> образования
                        </div>
                    </a>
                </div>
                {{-- <nav>
                    <ul>
                        <li><a href="#">О платформе</a></li>
                        <li><a href="#">Важные документы</a></li>
                        <li><a href="#">Преподаватели</a></li>
                        <li><a href="#">Вебинары</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </nav>
                <a href="#" class="btn_r green-btn">Заказать звонок</a> --}}
                {{-- <div class="underheader"
                    style="display: inline-flex; min-height: 30px; background-color: #BFEACC; border-radius: 100px;">
                    <div class="user-menu" style="justify-self: flex-end; display: flex; justify-content: center;">
                        <a href="#" class="btn btn-link" style="color: #000; font-size: 11px">Регистрация</a>
                        <a href="#" class="btn btn-link" style="color: #000; font-size: 11px">Вход</a>
                    </div>
                </div> --}}
            </div>
        </div>


    </footer>

</body>
@endsection
{{-- 
</html> --}}
