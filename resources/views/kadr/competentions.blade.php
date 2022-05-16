@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="kadr-wrap card_alras">
                <div class="row">
                    <div class="form_competentions col-md-4">
                        <h3>Новая компетенция</h3>
                        <form action="#" style="display: flex; flex-direction: column">
                            <label>
                                Добавить новую компетенцию
                                <input type="text" class="form-control" placeholder="Название компетенции">
                            </label>
                            <label>
                                Подтверждающий документ (основание)
                                <input type="file" class="form-control" style="padding: 3px">
                            </label>
                            <button class="cta-btn">Добавить</button>
                        </form>
                    </div>
                    <div class="col-md-1">

                    </div>
                    {{-- <div class="matrix col-md-7">
                        <h3>Ваша матрица компетенций</h3>
                        <div id="tag-cloud"></div>
                    </div> --}}
                </div>
                

             

            </div>
        </div>
        

    </div>

@endsection
