@extends('layouts.app')

@section('content')
<body class="antialiased">

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
