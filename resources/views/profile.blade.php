@extends('layouts.app')

@section('content')

    <style>
        label {
            width: 100%;
            display: flex;
            flex-direction: column;
        }
    </style>
    <section id="profile">
        <div class="container">
            <div class="card_alras">
                <h2>

                    Здравствуйте, <b>{{ Auth::user()->fio }}</b>
                </h2>
                <p>
                    Рады приветствовать вас на платформе Технополис СГК: <br> передовая образовательная платформа на
                    базе
                    ведущего колледжа Самарской области
                </p>

                <div class="user-buttons">
                    <a href="{{ route('profile.requests') }}"
                       class="btr_r_b @if (isset($activetab) && $activetab == 'requests') active @endif">Ваши заявки</a>
                    <a href="{{ route('profile.active') }}"
                       class="btr_r_b @if (!isset($activetab) || $activetab == '') active @endif">Активные курсы</a>
                    <a href="{{ route('profile.competentions') }}"
                       class="btr_r_b @if (isset($activetab) && $activetab == 'competentions') active @endif">Добавить
                        свои компетенции</a>
                    <a href="{{ route('profile.resume') }}"
                       class="btr_r_b @if (isset($activetab) && $activetab == 'help') active @endif">Внести данные для
                        резюме</a>
                    <a href="{{ route('profile.sled') }}"
                       class="btr_r_b @if (isset($activetab) && $activetab == 'help') active @endif">Загрузка грамот
                        (#цифровойслед)</a>
                    <a href="{{ route('competentions') }}"
                       class="btr_r_b @if (isset($activetab) && $activetab == 'help') active @endif">Фильтр курсов</a>
                    {{-- <a href="{{ route('profile.activities') }}" class="btr_r_b @if (isset($activetab) && $activetab == 'activities') active @endif">Мероприятия</a> --}}
                    {{-- <a href="{{ route('profile.help') }}" class="btr_r_b @if (isset($activetab) && $activetab == 'help') active @endif">Вопрос в поддержку</a> --}}
                    {{-- <a href="{{ route('kadr.competentions') }}" class="btr_r_b @if (isset($activetab) && $activetab == 'competentions') active @endif">Мои компетенции (матрица компетенций)</a> --}}
                </div>
                @if (!isset($activetab) || $activetab == '')
                    <div class="active-courses">
                        <h3>Ваши активные курсы</h3>

                        <div class="courses-list">
                            @if (isset(Auth::user()->requestss) || Auth::user()->requestss !== null)
                                @foreach (Auth::user()->requestss as $request)
                                    <div class="course-item">
                                        <div>
                                            <div class="type">
                                                Курс
                                            </div>

                                            <div class="title">
                                                {{ $request->course->title }}
                                            </div>

                                            <div class="stat">
                                                #статистика
                                                <div class="stat-item">

                                                    <b>
                                                        Пройденные темы
                                                    </b>
                                                    {{ $request->course->completelessons() }} из
                                                    {{ $request->course->countlessons() }}

                                                    <div class="progress">
                                                        <div class="active"
                                                             style="width: {{ $request->course->countlessons() != 0 ? ($request->course->completelessons() / $request->course->countlessons()) * 100 . '%' : 100 . '%' }}">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="buttons">
                                                <a href="{{ route('platform', ['course_id' => $request->course->id]) }}"
                                                   class="btr_r_b active" style="text-align: center">Продолжить
                                                    прохождение
                                                    курса</a>
                                                <a href="#" class="btn btn-link" style="text-align: left">Скачать
                                                    программу
                                                    обучения</a>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>


                    </div>
                @elseif ($activetab == 'requests')
                    <div class="requests">

                        <h3>Ваши заявки</h3>
                        <h2>Курсы</h2>

                        <table class="table">
                            <th>
                                #
                            </th>
                            <th>
                                Название курса
                            </th>
                            <th>
                                Дата заявки
                            </th>
                            <th>
                                Статус заявки
                            </th>
                            <th>
                                Кнопки
                            </th>
                            @if (isset(Auth::user()->requests) || Auth::user()->requests !== null)
                                @foreach (Auth::user()->requests as $index => $request)

                                    <tr>
                                        <td>
                                            {{ $index + 1 }}
                                        </td>
                                        <td>
                                            {{ $request->course->title }}
                                        </td>
                                        <td>
                                            {{ $request->created_at }}
                                        </td>
                                        <td>
                                            {{ $request->status }}
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    {{-- <div>
                                            <div class="type">
                                                Заявка
                                            </div>

                                            <div class="title">
                                                {{ $request->course->title }}
                                            </div>



                                            <div class="buttons">
                                                <a href="#" class="btr_r_b active" style="text-align: center">Перейти к
                                                    заявке</a>

                                            </div>
                                        </div> --}}

                                @endforeach
                            @endif
                        </table>
                        <h2>Мероприятия</h2>

                        <table class="table">
                            <th>
                                #
                            </th>
                            <th>
                                Название мероприятия
                            </th>
                            <th>
                                Дата заявки
                            </th>
                            <th>
                                Статус заявки
                            </th>
                            <th>
                                Кнопки
                            </th>
                            @if (isset(Auth::user()->activities) || Auth::user()->activities !== null)
                                @foreach (Auth::user()->activities as $index1 => $request_activities)
                                    <tr>
                                        <td>
                                            {{ $index1 + 1 }}
                                        </td>
                                        <td>
                                            {{ $request_activities->activity->name }}
                                        </td>
                                        <td>
                                            {{ $request_activities->created_at }}
                                        </td>
                                        <td>
                                            {{ $request_activities->status }}
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    {{-- <div>
                                            <div class="type">
                                                Заявка
                                            </div>

                                            <div class="title">
                                                {{ $request->course->title }}
                                            </div>



                                            <div class="buttons">
                                                <a href="#" class="btr_r_b active" style="text-align: center">Перейти к
                                                    заявке</a>

                                            </div>
                                        </div> --}}

                                @endforeach
                            @endif
                        </table>


                    </div>

                @elseif($activetab == 'competentions')

                    <button
                        class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded mt-4"
                        data-bs-toggle="modal" data-bs-target="#addCompLinkModal" onclick="modalHandler(true)">
                        Добавить компетенцию
                    </button>

                    <div>
                        <h3 class="font-medium leading-tight text-3xl mt-0 mb-2 text-blue-600 mt-3 mb-2">
                            Ваши компетенции:
                        </h3>

                        <div class="flex">


                        @foreach($compUser as $comp)
                                @php
                                    $compItem = \App\CompetentionD::where(['id' => $comp->competention_d_id])->first();
                                @endphp
                             <div class="border border-dashed border-2 h-16 flex justify-center items-center text-gray-400 text-lg px-3 mr-2 rounded-lg font-bold focus:ring-2 focus:ring-indigo-500 mb-2"> {{$compItem->name}} </div>

                        @endforeach
                        </div>
                    </div>
                    <!-- Modal -->
                    <div
                        class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto mt-5"
                        id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog relative w-auto pointer-events-none" style="margin-top: 65px; min-width: 600px">
                            <div
                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                <div
                                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">
                                        Форма добавления компетенции</h5>
                                    <button type="button"
                                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                            data-bs-dismiss="modal" aria-label="Close"  onclick="modalHandler()"></button>
                                </div>
                                <div class="modal-body relative p-4">
                                    <form action="/competentions/addusercomp" method="POST" id="formAddUserComp">


                                   <?php
                                    $comps = \App\CompetentionD::all();


                                   ?>
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <select name="comp" id="comp">
                                           <option value="-">-</option>
                                           @foreach($comps as $value)
                                               <option value="@php
                                                   echo($value['id']);
                                               @endphp">{{$value['name']}}</option>


                                           @endforeach
                                       </select>
                                       <input type="hidden" name="user_id" value="{{$user_id}}" >
                                    </form>

                                </div>
                                <div
                                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                    <button type="button" class="px-6
                                      py-2.5
                                      bg-gray-600
                                      text-white
                                      font-medium
                                      text-xs
                                      leading-tight
                                      uppercase
                                      rounded
                                      shadow-md
                                      hover:bg-gray-700 hover:shadow-lg
                                      focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0
                                      active:bg-gray-800 active:shadow-lg
                                      transition
                                      duration-150
                                      ease-in-out" data-bs-dismiss="modal"  onclick="modalHandler()">
                                        Закрыть
                                    </button>
                                    <button type="button" class="px-6
                                      py-2.5
                                      bg-blue-600
                                      text-white
                                      font-medium
                                      text-xs
                                      leading-tight
                                      uppercase
                                      rounded
                                      shadow-md
                                      hover:bg-blue-700 hover:shadow-lg
                                      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                      active:bg-blue-800 active:shadow-lg
                                      transition
                                      duration-150
                                      ease-in-out
                                      ml-1"
                                            onclick="submitHandler()">Сохранить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-4 w-full">--}}
                    {{--                    <div class="flex items-center relative p-4 w-full bg-white rounded-lg overflow-hidden shadow hover:shadow-md">--}}
                    {{--                        <div class="w-12 h-12 rounded-full bg-gray-100 d-flex items-center justify-center text-gray-600">ВЕБ</div>--}}
                    {{--                        <div class="ml-3">--}}
                    {{--                            <p class="font-medium text-gray-800">Знания веб-разработки</p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}


                    {{--                </div>--}}

                @elseif($activetab == 'resume')
                <form action="/competentions/resume" method="POST">
                    <h3>Личные данные</h3>
                    <label for="#">
                        ФИО
                        <input type="text" placeholder="ФИО" required name="fio">
                    </label>
                    <label for="#">
                        Номер телефона
                        <input type="text" placeholder="Номер телефона" required  name="phone">
                    </label>
                    <label for="#">
                        Город
                        <input type="text" placeholder="Город" name="city" required>

                        <div>
                            <input type="checkbox" name="comand" required> Готовность к командировкам
                        </div>

                    </label>
                    <label for="#">
                        Email
                        <input type="text" placeholder="Email" required name="email">
                    </label>
                    <label for="#">
                        Гражданство
                        <input type="text" placeholder="Гражданство" required name="grazd">
                    </label>
                    <label for="#">
                        Образование
                        <input type="text" placeholder="Образование" required  name="obr">
                    </label>
                    <label for="#">
                        Дата рождения
                        <input type="text" placeholder="Дата рождения" required  name="birth">
                    </label>
                    <label for="#">
                        Семейное положение
                        <input type="text" placeholder="Семейное положение" required name="sem">
                    </label>

                    <hr>

                    <h3 class="font-medium text-2xl mt-4">Опыт работы</h3>

                    <div style="margin-top: 10px">
                        <h4 class="font-medium text-xl mt-1 mb-2">
                            Последнее место работы
                        </h4>
                        <label for="#">
                            Наименование организации
                            <input type="text" placeholder="Наименование организации" required name="rabota_name">
                        </label>
                        <label for="#">
                            Должность
                            <input type="text" placeholder="Должность" required name="rabota_dolzn">
                        </label>


                    </div>

                    <hr>

                    <h3 class="font-medium text-2xl mt-4">Образование</h3>

                    <div style="margin-top: 10px">
                        <h4 class="font-medium text-xl mt-1 mb-2">
                            ВУЗ/колледж
                        </h4>
                        <label for="#">
                            Наименование организации
                            <input type="text" placeholder="Наименование организации" required name="ucheba_name">
                        </label>
                        <label for="#">
                            Специальность
                            <input type="text" placeholder="Специальность"  required name="ucheba_spec">
                        </label>


                    </div>

                    <div style="margin-top: 10px">
                        <h4 class="font-medium text-xl mt-1 mb-2">
                            Школа
                        </h4>
                        <label for="#">
                            Наименование организации
                            <input type="text" placeholder="Наименование организации" required   name="school">
                        </label>



                    </div>


                    <hr>

                    <h3 class="font-medium text-2xl mt-4">Дополнительная информация</h3>

                    <label for="#">
                        Иностранный язык
                        <input type="text" placeholder="Иностранный язык" required  name="lang">
                    </label>


                    <label for="#">

                        <div>
                            <input type="checkbox" name="vod_udostov" required> Наличие водительсикх прав
                        </div>

                    </label>

                    <button type="submit">Сгенерировать</button>

                </form>

                @elseif ($activetab == 'activities')
                    <div class="requests">

                        <h3>Мероприятия</h3>
                        <table class="table">
                            <tr>
                                <th>#</th>

                                <th>Названия мероприятия</th>
                                <th>
                                    Статус
                                </th>
                                <th>
                                    Кнопки
                                </th>
                            </tr>
                            @foreach ($activities as $index => $act_av)
                                <tr>
                                    <td>
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        {{ $act_av->name }}
                                    </td>
                                    <td>
                                        {{ $act_av->order ? $act_av->order->status : 'Заявка не подавалась' }}
                                    </td>
                                    <td>
                                        @php
                                            $uniq = $act_av->order ? $act_av->order->uniq_number : null;
                                        @endphp
                                        @if ($uniq != null)
                                            <a href='{{ "/activity/profile/$uniq" }}' class="btn_r">Перейти в
                                                кабинет
                                                мероприятия</a>
                                        @else
                                            <a href='{{ "/activity/$act_av->id/new" }}' class="btn_r">Подать
                                                заявку</a>
                                        @endif

                                    </td>
                                </tr>

                            @endforeach
                        </table>

                    </div>
                @elseif ($activetab == 'help')
                    <h3 style="margin-top: 30px">Раздел в разработке</h3>
                @endif

            </div>
        </div>
    </section>

    <script>
        async function postData(url = '', data = {}) {
            // Default options are marked with *
            const response = await fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                    'Content-Type': 'application/json'
                    // 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *client
                body: JSON.stringify(data) // body data type must match "Content-Type" header
            });
            return await response.json(); // parses JSON response into native JavaScript objects
        }
        let modal = document.getElementById("modal");
        function modalHandler(val) {
            if (val) {
                fadeIn(modal);
            } else {
                fadeOut(modal);
            }
        }
        function submitHandler() {
            let form = document.getElementById("formAddUserComp");
            let fdata = new FormData(form);

            postData(form.getAttribute('action'), {user_id: fdata.get('user_id'), comp: fdata.get('comp')})
                .then((data) => {
                    location.reload()
                });
        }
        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }
        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }
    </script>

@endsection
