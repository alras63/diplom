@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <section class="main">
            <div class="container">
                <div class="d-flex">
                    <div class="maintext">
                        <h1 style="font-size: 23px">
                            {{ $course->title }}
                        </h1>

                        <div class="napr">
                            <p>
                                {{ $course->description }}
                            </p>

                            @auth
                                <a href="/course/{{$course->id}}/order" class="btn btn_r"
                                   style="border-radius: 4px; min-height: 55px; background-color: #34A853; display: inline-flex; align-items: center; font-size: 18px; font-weight: 600; margin-left: 0">Записаться
                                    на курс</a>
                            @endauth

                            @guest
                                <a href="/course/{{$course->id}}/orderRegister" class="btn btn_r"
                                   style="border-radius: 4px; min-height: 55px; background-color: #34A853; display: inline-flex; align-items: center; font-size: 18px; font-weight: 600; margin-left: 0">
                                    Зарегистрироваться и записаться
                                </a>
                            @endguest
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>


    <section id="advantages">
        <div class="container">
            <h2 class="section-title">
                Преимущества нашей Платформы
            </h2>

            <div class="advantages-list">
                <div class="adventages-item">
                    <div class="icon">
                        <img src="{{ asset('images/a1.png') }}" alt="Преимущества">
                    </div>
                    <div class="content">
                        <div class="title">
                            ДИПЛОМ / СЕРТИФИКАТ
                        </div>
                        <div class="description">
                            Выдается после успешного окончания курса
                        </div>
                    </div>
                </div>
                <div class="adventages-item">
                    <div class="icon">
                        <img src="{{ asset('images/a2.png') }}" alt="Преимущества">
                    </div>
                    <div class="content">
                        <div class="title">
                            ПРЕПОДАВАТЕЛИ
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
                            НЕДОРОГО
                        </div>
                        <div class="description">
                            Стараемся держать конкурентные цены, чтобы обучение было доступно каждому
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="ca">
        <div class="container">
            <h2 class="section-title">
                Кому подойдет эта программа обучения?
            </h2>

            <div class="ca-list">
                <div class="list-item">
                    <div class="num">
                        01
                    </div>
                    <div class="content">
                        <div class="title">
                            ПРЕПОДАВАТЕЛЯМ
                        </div>
                        <div class="description">
                            На курсе рабираются важные аспекты деятельности в цифровом пространстве для преподавателей ОО
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="num">
                        01
                    </div>
                    <div class="content">
                        <div class="title">
                            ПРЕПОДАВАТЕЛЯМ
                        </div>
                        <div class="description">
                            На курсе рабираются важные аспекты деятельности в цифровом пространстве для преподавателей ОО
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="num">
                        01
                    </div>
                    <div class="content">
                        <div class="title">
                            ПРЕПОДАВАТЕЛЯМ
                        </div>
                        <div class="description">
                            На курсе рабираются важные аспекты деятельности в цифровом пространстве для преподавателей ОО
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section id="results">
        <div class="container">
            <h2 class="section-title">
                Знания и навыки, которые вы приобретете
            </h2>
            <div class="results-list">
                <div class="r-item">
                    <div class="icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 27.3C21.3454 27.3 27.3 21.3454 27.3 14C27.3 6.65459 21.3454 0.699982 14 0.699982C6.65462 0.699982 0.700012 6.65459 0.700012 14C0.700012 21.3454 6.65462 27.3 14 27.3Z"
                                fill="black" stroke="black" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.4 9.89519L13.1908 19.6L7 13.6192L8.6198 12.054L13.1194 16.401L20.7116 8.39999L22.4 9.89519Z"
                                fill="white" />
                        </svg>

                    </div>
                    <div class="content">
                        <b>Основные элементы </b> <br> цифрового пространства
                    </div>
                </div>
                <div class="r-item">
                    <div class="icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 27.3C21.3454 27.3 27.3 21.3454 27.3 14C27.3 6.65459 21.3454 0.699982 14 0.699982C6.65462 0.699982 0.700012 6.65459 0.700012 14C0.700012 21.3454 6.65462 27.3 14 27.3Z"
                                fill="black" stroke="black" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.4 9.89519L13.1908 19.6L7 13.6192L8.6198 12.054L13.1194 16.401L20.7116 8.39999L22.4 9.89519Z"
                                fill="white" />
                        </svg>

                    </div>
                    <div class="content">
                        <b>Средства</b> <br>
                        сетевого общения
                    </div>
                </div>
                <div class="r-item">
                    <div class="icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 27.3C21.3454 27.3 27.3 21.3454 27.3 14C27.3 6.65459 21.3454 0.699982 14 0.699982C6.65462 0.699982 0.700012 6.65459 0.700012 14C0.700012 21.3454 6.65462 27.3 14 27.3Z"
                                fill="black" stroke="black" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.4 9.89519L13.1908 19.6L7 13.6192L8.6198 12.054L13.1194 16.401L20.7116 8.39999L22.4 9.89519Z"
                                fill="white" />
                        </svg>

                    </div>
                    <div class="content">
                        <b> Психологические угрозы </b> <br>
                        безопасности в цифровом пространстве
                    </div>
                </div>
                <div class="r-item">
                    <div class="icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 27.3C21.3454 27.3 27.3 21.3454 27.3 14C27.3 6.65459 21.3454 0.699982 14 0.699982C6.65462 0.699982 0.700012 6.65459 0.700012 14C0.700012 21.3454 6.65462 27.3 14 27.3Z"
                                fill="black" stroke="black" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.4 9.89519L13.1908 19.6L7 13.6192L8.6198 12.054L13.1194 16.401L20.7116 8.39999L22.4 9.89519Z"
                                fill="white" />
                        </svg>

                    </div>
                    <div class="content">
                        <b> Способы обеспечения</b> <br>
                        психологической комфортной среды в цифровом пространстве
                    </div>
                </div>
                <div class="r-item">
                    <div class="icon">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 27.3C21.3454 27.3 27.3 21.3454 27.3 14C27.3 6.65459 21.3454 0.699982 14 0.699982C6.65462 0.699982 0.700012 6.65459 0.700012 14C0.700012 21.3454 6.65462 27.3 14 27.3Z"
                                fill="black" stroke="black" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M22.4 9.89519L13.1908 19.6L7 13.6192L8.6198 12.054L13.1194 16.401L20.7116 8.39999L22.4 9.89519Z"
                                fill="white" />
                        </svg>

                    </div>
                    <div class="content">
                        <b> Информационные ресурсы</b> <br>
                        необходимые для организации психологической комфортной среды в цифровом пространстве
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="how">
        <div class="container">
            <h2 class="section-title">
                Как проходит обучение?
            </h2>

            <div class="how-list">
                <div class="list-item">
                    <div class="num">
                        01
                    </div>
                    <div class="content">
                        <div class="title">
                            ДОСТУП К ЛЕКЦИИ
                        </div>
                        <div class="description">
                            Чтобы получить доступ к каждой следующей лекции, нужно пройти предыдущую и сдать
                            практическую
                            работу.
                            <br>
                            В лекциях – видеоматериалы, текст и презентации
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="num">
                        02
                    </div>
                    <div class="content">
                        <div class="title">
                            ПРАКТИЧЕСКИЕ РАБОТЫ
                        </div>
                        <div class="description">
                            Закрепление пройденного материала в форме теста, опросника, задания, итоговой работы и т.д.
                            Выполняете практические работы в том темпе, который вам комфортен
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="num">
                        03
                    </div>
                    <div class="content">
                        <div class="title">
                            ИТОГОВАЯ РАБОТА
                        </div>
                        <div class="description">
                            После прохождения всего курса нужно выполнить итоговую работу, подтверждающую приобретенные
                            знания и навыки
                        </div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="num">
                        04
                    </div>
                    <div class="content">
                        <div class="title">
                            ДОКУМЕНТ
                        </div>
                        <div class="description">
                            После проверки вашей итоговой работы мы загружаем в личный кабинет или отправляем на
                            электронную
                            почту документ о прохождении курса
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container" style="margin-top: 70px">
        <section id="plane">
            <div class="container">
                <h2 class="section-title">
                    Учебный план
                </h2>

                @php
                    $modules = $course->modules;
                @endphp

                @foreach ($modules as $module)
                    <div class="module">

                        <div class="mod-title">
                            {{ $module->title }}
                        </div>
                        @php
                            $lessons = $module->lessons;
                        @endphp
                        <div class="lessons-list">
                            @foreach ($lessons as $lesson)
                                <div class="lesson-item">
                                    {{ $lesson->title }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

@endsection
