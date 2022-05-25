@extends('layouts.app')

@section('content')
    <link href="{{ asset('css/app-tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components-v2.css') }}" rel="stylesheet">

    <style>
        label {
            width: 100%;
            display: flex;
            flex-direction: column;
        }
    </style>
    <section id="comp">
        <div class="container">
            <div class="card_alras">
                <h2 class="text-3xl font-bold">
                    Помощник составления резюме
                </h2>
                <h3 class="text-xl font-bold mt-3 mb-3">

                </h3>
                <div class="bg-white">
                    <div>
                        <form action="#">
                            <h3>Личные данные</h3>
                            <label for="#">
                                ФИО
                                <input type="text" placeholder="ФИО">
                            </label>
                            <label for="#">
                                Номер телефона
                                <input type="text" placeholder="Номер телефона">
                            </label>
                            <label for="#">
                                Город
                                <input type="text" placeholder="Город">

                                <div>
                                    <input type="checkbox"> Готовность к командировкам
                                </div>

                            </label>
                            <label for="#">
                                Email
                                <input type="text" placeholder="Email">
                            </label>
                            <label for="#">
                                Гражданство
                                <input type="text" placeholder="Гражданство">
                            </label>
                            <label for="#">
                                Образование
                                <input type="text" placeholder="Образование">
                            </label>
                            <label for="#">
                                Дата рождения
                                <input type="text" placeholder="Дата рождения">
                            </label>
                            <label for="#">
                                Семейное положение
                                <input type="text" placeholder="Семейное положение">
                            </label>

                            <hr>

                            <h3>Опыт работы</h3>

                            <div>
                                <h4>
                                    Место работы
                                </h4>
                                <label for="#">
                                    Наименование организации
                                    <input type="text" placeholder="Наименование организации">
                                </label>
                                <label for="#">
                                    Должность
                                    <input type="text" placeholder="Должность">
                                </label>
                                <label for="#">
                                    Время работы
                                    <input type="text" placeholder="Время работы">
                                </label>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
