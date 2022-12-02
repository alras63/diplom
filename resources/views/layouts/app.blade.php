<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
<script src="{{ asset('js/jquery.svg3dtagcloud.min.js') }}" defer></script> --}}

{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app-tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components-v2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components-v2.css') }}" rel="stylesheet">
    <link href="{{ asset('font/stylesheet.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">
    <header class="pb-0">
        <div class="py-2 pt-1 mx-auto d-flex max-w-screen-xl">
            <div class="logo">
                <a href="{{ route('/') }}" style="width: 80px; height: 30px">
                    <img src="{{ asset('images/logo.svg') }}" alt="Логотип">
                    <div class="logo-text">
                            <span style="font-size: 9px; line-height: 95%">
                                Модуль дополнительного образования
                            </span>
                    </div>
                </a>
            </div>
            <div class="user-menu" style="justify-self: flex-end; display: flex; justify-content: center;">
                @auth
                    <a href="{{ route('profile') }}" class="btn btn-link"
                       style="color: #000; font-size: 11px">Профиль</a>
                    {!! Form::open(['method' => 'POST', 'route' => 'logout']) !!}
                    <button type="submit" class="btn btn-link" style="color: #000; font-size: 11px">Выход</button>
                    {!! Form::close() !!}

                @endauth
                @guest
                    <div class="d-flex items-center">
                        <a href="{{ route('register') }}"
                           class="no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                           style="color: #000; font-size: 11px">Регистрация</a>
                        <a href="{{ route('login') }}"
                           class="no-underline mx-2 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                           style="color: #000; font-size: 11px">Вход</a>
                    </div>

                @endguest
            </div>


        </div>
        <div class="mx-auto max-w-screen-xl">
            <div class="mt-4 flex items-center justify-between w-100">
                <div class="flex items-center justify-between w-100 swiper-types">
                    <div class="swiper-wrapper items-center types-course">
                        <a href="{{ route('course.list') }}"
                           class="swiper-slide flex-shrink-0 inline-flex items-center space-3 no-underline hover:no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                           style="text-decoration: none !important">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" style="width: 16px;"
                                 x="0px" y="0px" viewBox="0 0 487.3 487.3"
                                 style="enable-background:new 0 0 487.3 487.3;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path style="fill: #fff"
                                              d="M487.2,69.7c0,12.9-10.5,23.4-23.4,23.4h-322c-12.9,0-23.4-10.5-23.4-23.4s10.5-23.4,23.4-23.4h322.1
                                    C476.8,46.4,487.2,56.8,487.2,69.7z M463.9,162.3H141.8c-12.9,0-23.4,10.5-23.4,23.4s10.5,23.4,23.4,23.4h322.1
                                    c12.9,0,23.4-10.5,23.4-23.4C487.2,172.8,476.8,162.3,463.9,162.3z M463.9,278.3H141.8c-12.9,0-23.4,10.5-23.4,23.4
                                    s10.5,23.4,23.4,23.4h322.1c12.9,0,23.4-10.5,23.4-23.4C487.2,288.8,476.8,278.3,463.9,278.3z M463.9,394.3H141.8
                                    c-12.9,0-23.4,10.5-23.4,23.4s10.5,23.4,23.4,23.4h322.1c12.9,0,23.4-10.5,23.4-23.4C487.2,404.8,476.8,394.3,463.9,394.3z
                                    M38.9,30.8C17.4,30.8,0,48.2,0,69.7s17.4,39,38.9,39s38.9-17.5,38.9-39S60.4,30.8,38.9,30.8z M38.9,146.8
                                    C17.4,146.8,0,164.2,0,185.7s17.4,38.9,38.9,38.9s38.9-17.4,38.9-38.9S60.4,146.8,38.9,146.8z M38.9,262.8
                                    C17.4,262.8,0,280.2,0,301.7s17.4,38.9,38.9,38.9s38.9-17.4,38.9-38.9S60.4,262.8,38.9,262.8z M38.9,378.7
                                    C17.4,378.7,0,396.1,0,417.6s17.4,38.9,38.9,38.9s38.9-17.4,38.9-38.9C77.8,396.2,60.4,378.7,38.9,378.7z"/>
                                    </g>
                                </g>
                            </svg>
                            <span class="block ml-3 no-underline" style="text-decoration: none !important">
                                Каталог курсов
                            </span>
                        </a>
                        <a href="{{ route('course.list', ['type' => 'po']) }}"
                           class="swiper-slide flex-shrink-0 inline-flex items-center space-3 no-underline hover:no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                           style="text-decoration: none !important">
                             <span class="block no-underline" style="text-decoration: none !important">
                              Профессиональное обучение
                            </span>
                        </a>
                        <a href="{{ route('course.list', ['type' => 'pk']) }}"
                           class="swiper-slide flex-shrink-0 inline-flex items-center space-3 no-underline hover:no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                           style="text-decoration: none !important">
                             <span class="blockno-underline" style="text-decoration: none !important">
                                Повышение квалификации
                            </span>
                        </a>
                        <a href="{{ route('course.list', ['type' => 'dop']) }}"
                           class="swiper-slide flex-shrink-0 inline-flex items-center space-3 no-underline hover:no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                           style="text-decoration: none !important">
                             <span class="block no-underline" style="text-decoration: none !important">
                                Дополнительное образование детей и взрослых
                            </span>
                        </a>
                        <a href="{{ route('course.list', ['type' => 'perepod']) }}"
                           class="swiper-slide flex-shrink-0 inline-flex items-center space-3 no-underline hover:no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-3 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                           style="text-decoration: none !important">
                             <span class="block no-underline" style="text-decoration: none !important">
                                Переподготовка
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/sly.min.js') }}"></script>

<script src="{{ asset('js/app-tailwind.js') }}"></script>
<script src="{{ asset('js/components-v2.js') }}"></script>
<script src="{{ asset('js/prism.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
