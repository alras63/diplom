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
                    <div class="flex items-center justify-between w-100">
                        <a href="{{ route('course.list') }}"
                            class=" flex-shrink-0 inline-flex items-center space-3 no-underline hover:no-underline mx-2 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"
                            style="text-decoration: none !important">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" style="width: 16px;"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 487.3 487.3"
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
                                    C17.4,378.7,0,396.1,0,417.6s17.4,38.9,38.9,38.9s38.9-17.4,38.9-38.9C77.8,396.2,60.4,378.7,38.9,378.7z" />
                                    </g>
                                </g>
                            </svg>
                            <span class="block ml-3 no-underline" style="text-decoration: none !important">
                                Каталог курсов
                            </span>

                        </a>

                        {{-- <div style="width: 40%;" class="flex-shrink-0  hidden lg:block">
                            <div class="input-group relative flex flex-wrap items-stretch w-full mb-0">
                                <input type="search"
                                    class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                    placeholder="Введите название курса" aria-label="Поиск"
                                    aria-describedby="button-addon2">
                                <button
                                    class="btn inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
                                    type="button" id="button-addon2">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
                                        class="w-4" role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                        </path>
                                    </svg>
                                </button>
                            </div>

                        </div> --}}
                        {{-- <div class="flex flex-shrink-0 hidden lg:block justify-self-end">
                            <a href="#" class="font-normal text-sm no-underline uppercase px-3">
                                О платформе
                            </a>
                            <a href="#" class="font-normal text-sm no-underline uppercase px-3">
                                Документы
                            </a>

                            <a href="#" class="font-normal text-sm no-underline uppercase px-3">
                                Преподаватели
                            </a>
                            <a href="#" class="font-normal text-sm no-underline uppercase px-3">
                                Вебинары
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="flex my-4 lg:justify-center">
                <div class="frame" id="basic" style="overflow: hidden;">
                    <nav class="nav clearfix flex flex-shrink-0 w-100 flex-nowrap;"
                        style="flex-wrap: nowrap !important">
                        <a href="#" class="font-medium text-sm no-underline uppercase px-3 flex-shrink-0 slidee">
                            ИКТ
                        </a>
                        <a href="#" class="font-medium text-sm no-underline uppercase px-3 flex-shrink-0 slidee">
                            Образование
                        </a>
                        <a href="#" class="font-medium text-sm no-underline uppercase px-3 flex-shrink-0 slidee">
                            Производство
                        </a>
                        <a href="#" class="font-medium text-sm no-underline uppercase px-3 flex-shrink-0 slidee">
                            Строительство
                        </a>
                        <a href="#" class="font-medium text-sm no-underline uppercase px-3 flex-shrink-0 slidee">
                            Сфера услуг
                        </a>
                        <a href="#" class="font-medium text-sm no-underline uppercase px-3 flex-shrink-0 slidee">
                            Творчество и дизайн
                        </a>
                        <a href="#" class="font-medium text-sm no-underline uppercase px-3 flex-shrink-0 ">
                            Транспорт и логистика
                        </a>
                    </nav>

                </div>

            </div> --}}

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
