<?php
use Illuminate\Support\Facades\Storage;
?>

@extends('layouts.app')

@section('content')

    <section id="platform">
        <div class="container">
            @if (isset($error) && $error != '')
                <div class="card_alras">
                    <h2 class="plan_title" style="font-size: 23px">
                        {!! $text !!}
                    </h2>

                    <a href="#" onclick="history.back()" class="btn btn_r">Вернуться назад</a>
                </div>
            @else
                <div class="platform_grid">

                    <div class="card_alras modules">
                        <h2 class="plan_title">
                            Модули и темы
                        </h2>
                        @if (isset($modules) && $modules != '')
                            @foreach ($modules as $index => $module)
                                <div>
                                    <b>
                                        Модуль {{ $index + 1 }}
                                    </b>
                                    <br>
                                    <span class="module_title">
                                        {{ $module->title }}
                                    </span>

                                    @foreach ($module->lessons as $index_l => $lesson)
                                        <div class="lesson_item">
                                            <b>
                                                Тема {{ $index_l + 1 }}
                                            </b>
                                            <br>
                                            <span class="module_title">
                                                {{ $lesson->title }}
                                            </span>

                                            <div class="buttons">
                                                @php
                                                    if(isset($lessonfc) && $lessonfc !== null) { @endphp
                                                    <a href="{{ route('platform.lesson', ['course_id' => $course->id, 'module_id' => $module->id, 'lesson_id' => $lesson->id]) }}"
                                                    class="btr_r_b @if (!isset($type) && $lesson->id == $lessonfc->id) active @endif"
                                                    style="text-align: center">Лекция</a>
                                                    @php
                                                    } else { @endphp
                                                        <a href="{{ route('platform.lesson', ['course_id' => $course->id, 'module_id' => $module->id, 'lesson_id' => $lesson->id]) }}"
                                                    class="btr_r_b"
                                                    style="text-align: center">Лекция</a>
                                                    @php
                                                }
                                                @endphp
                                                
                                                @foreach ($lesson->practices as $prct)
                                                    <a href="{{ route('platform.practice', ['course_id' => $course->id, 'module_id' => $module->id, 'lesson_id' => $lesson->id, 'practice_id' => $prct->id]) }}"
                                                        class="btr_r_b @if (isset($type) && $type == 'practice') active @endif" style=" text-align:
                                                        center">Практика</a>

                                                @endforeach
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif

                    </div>
                    @if (!isset($type))
                        <div class="card_alras view">
                            @if (isset($lessonfc))
                                <h2 class="lessons_pretitle">
                                    Тема
                                </h2>
                                <div class="lesson-title">
                                    {{ $lessonfc->title }}
                                </div>
                                @if ($lessonfc->isComplete(Auth::user()->id))
                                    <div class="alert alert-success mt-3">
                                        Вы уже прошли эту лекцию. Переходите к следующей! :)
                                    </div>
                                @endif

                                <div class="lesson-content">

                                    @if (isset($lessonfc->content) && $lessonfc->content != '')
                                                    <div class="card_alras">
                                                            {!! $lessonfc->content->content !!}
                                                    </div>
                                    @endif
                                    @if (isset($lessonfc->content->link_pdf) && $lessonfc->content->link_pdf != '')
                                        @php
                                            $url = Storage::url($lessonfc->content->link_pdf);
                                        @endphp
                                        <iframe src="{{url($url)}}" width="100%"
                                            class="pdfIframe"></iframe>
                                    @endif

                                    <div class="buttons">
                                        <form
                                            action="/platform/{{ $lessonfc->module->course->id }}/{{ $lessonfc->module->id }}/{{ $lessonfc->id }}/save"
                                            method="POST">
                                            {{ csrf_field() }}
                                            <input type="submit" value="Закончить лекцию" class="btn_r"
                                                style="padding: 20px 50px">
                                        </form>
                                    </div>

                                </div>

                            @endif
                        </div>
                    @else
                        <div class="card_alras view">

                            <h2 class="lessons_pretitle">
                                Практическая работа
                            </h2>
                            <div class="lesson-title">
                                {{ $practice->title }}
                            </div>

                            <div class="lesson-content">

                                @if (isset($practice->content) && $practice->content != '')
                                    {!! $practice->content !!}
                                @endif


                            </div>

                            <div class="otchet">
                                <h2 class="lessons_pretitle" style="margin-top: 30px">
                                    Отчет по практической работе
                                </h2>

                                <form action="{{ $practice->id }}/save" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="practical_id" value="{{ $practice->id }}">

                                    <label>
                                        Архив с выполненной работой. Необходимо создать .rar или .zip архив, и поместить
                                        туда все файлы с выполненной работой
                                        <input type="file" name="file" id="file">
                                    </label>
                                    <label>
                                        Комментарий к выполненной работе
                                        <textarea name="comment" id="comment"></textarea>
                                    </label>
                                    <button type="submit" class="btn_r">Отправить работу</button>
                                </form>
                            </div>


                        </div>
                    @endif

                </div>
            @endif


        </div>
    </section>

@endsection
