@extends('layouts.app')

@section('content')

    <section id="profile">
        <div class="container">
            <div class="card_alras">
                <h2>

                    Здравствуйте, <b>{{ Auth::user()->fio }}</b>
                </h2>
                <p>
                    Рады приветствовать вас на платформе Технополис СГК: <br> передовая образовательная платформа на базе
                    ведущего колледжа Самарской области
                </p>

                <div class="user-buttons">
                    <a href="{{ route('profile.requests') }}" class="btr_r_b @if (isset($activetab) && $activetab == 'requests') active @endif">Ваши заявки</a>
                    <a href="{{ route('profile.active') }}" class="btr_r_b @if (!isset($activetab) || $activetab == '') active @endif">Активные курсы</a>
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
                                                class="btr_r_b active" style="text-align: center">Продолжить прохождение
                                                курса</a>
                                            <a href="#" class="btn btn-link" style="text-align: left">Скачать программу
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

@endsection
