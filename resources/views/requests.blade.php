@extends('layouts.app')

@section('content')

    <section id="requests">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @if (isset($order->request_json) && isset($order->paths) && $order->request_json !== '' && $order->paths !== '')

                        <div class="card" id="vashe">
                            <div class="card-header text-center">
                                <h4>
                                    Заполненные данные:
                                </h4>
                            </div>
                            <div class="p-3">
                                <ul>
                                    @foreach (json_decode($order->request_json) as $index => $req)

                                        <li>
                                            {{ $req }}
                                        </li>



                                    @endforeach

                                </ul>

                                <ul>
                                    @foreach (json_decode($order->paths) as $index => $path)

                                        <li>
                                            <a href="/docs/{{ $path }}">Файл {{ $index + 1 }}</a>
                                        </li>



                                    @endforeach

                                </ul>

                            </div>
                        </div>


                    @else
                        @if ($order->isSoglSfrom != 1 && $course->childSogl == 1)
                            <div class="card" id="formSogl">
                                <div class="card-header text-center">
                                    <h4>
                                        Заполнить заявление на обработку ПД, если Вы - несовершеннолетний!
                                    </h4>
                                </div>


                                <div class="card-body p-3">
                                    <form action='/api/order/{{ $o_id }}/createSogl' method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="order_id" value="{{ $o_id }}" />
                                        <label style="margin-right: 20px; margin-bottom: 20px; width: 100%"> ФИО родителя

                                            <input class="form-control" name="fio" type="text" placeholder="ФИО родителя"
                                                required>


                                        </label>

                                        <label style="margin-right: 20px; margin-bottom: 20px"> Серия паспорта родителя

                                            <input class="form-control" name="serial-passport" type="text"
                                                placeholder="Серия паспорта родителя" required>


                                        </label>
                                        <label style="margin-right: 20px; margin-bottom: 20px"> Номер паспорта родителя

                                            <input class="form-control" name="number-passport" type="text"
                                                placeholder="Номер паспорта родителя" required>


                                        </label>
                                        <label style="margin-right: 20px; margin-bottom: 20px; width: 100%"> Кем выдан
                                            паспорт
                                            родителя

                                            <input class="form-control" name="kem-passport" type="text"
                                                placeholder="Кем выдан паспорт родителя" required>


                                        </label>
                                        <label style="margin-right: 20px; margin-bottom: 20px"> Когда выдан паспорт родителя

                                            <input class="form-control" name="kogda-passport" type="text"
                                                placeholder="Когда выдан паспорт родителя" required>


                                        </label>
                                        <label style="margin-right: 20px; margin-bottom: 20px">Прописка по паспорту родителя

                                            <input class="form-control" name="propiska-passport" type="text"
                                                placeholder="Прописка по паспорту родителя" required>


                                        </label>
                                        <label style="margin-right: 20px; margin-bottom: 20px">ФИО РЕБЕНКА

                                            <input class="form-control" name="fio-child" type="text"
                                                placeholder="ФИО РЕБЕНКА" required>


                                        </label>

                                        <button type="submit" class="btn btn-primary"
                                            style="color: #fff; width: 100%">Сформировать заявление</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                        @if ($course->childSogl == 1 && $order->isSoglSfrom == 1 or $course->childSogl == 0)
                            <div class="card" id="formRegistration">
                                <div class="card-header text-center">
                                    <h4>
                                        Заполнить заявление на курс
                                    </h4>
                                </div>
                                <div class="p-3">
                                    <? 
                                    //  var_dump($course);
                                $docs = json_decode($course->docs);
                                if(isset($docs) && is_array($docs)) { ?>
                                    <h4>Скачайте документы, чтобы заполнить их и отправить нам</h4>

                                    <? 
                           
                                   foreach($docs as $doc) { ?>
                                    <a class='download-btn-sgk'
                                        href="{{ 'https://life.samgk.ru' . DIRECTORY_SEPARATOR . 'docs' . DIRECTORY_SEPARATOR . 'obr' . DIRECTORY_SEPARATOR . $doc }}">Ссылка
                                        на скачивание (Документ для заполнения)</a> <br>
                                    <? }
                                } ?>

                                </div>


                                <div class="card-body p-3">
                                    <form action='/api/order/{{ $o_id }}/submit' method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="order_id" value="{{ $o_id }}" />

                                        @foreach ($polya[0] as $index => $polye)
                                            @if (getTyped($types[0][$index]) == 'file')
                                                <label style="margin-right: 20px; margin-bottom: 20px"> {{ $polye }}

                                                    <input class="form-control" name="fil0[]" type="file"
                                                        {{ stristr(ltrim($types[0][$index]), '*', true) ? 'required' : '' }} />

                                                </label>
                                            @else
                                                <label style="margin-right: 20px; margin-bottom: 20px"> {{ $polye }}

                                                    <input class="form-control" name="genericInput[]"
                                                        type={{ getTyped($types[0][$index]) }}
                                                        {{ stristr(ltrim($types[0][$index]), '*', true) ? 'required' : '' }} />
                                                </label>
                                            @endif


                                        @endforeach

                                        <button type="submit" class="btn btn-primary"
                                            style="color: #fff; width: 100%">Отправить
                                            данные</button>

                                    </form>
                                </div>

                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </section>

@endsection
