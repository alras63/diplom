@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="lk row justify-content-center">
            <div class="col-md-12">
                <div class="card_alras">
                    <h2 class="lk_title">
                        Личный кабинет мероприятия
                    </h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block_title">
                                    Ваша карточка, {{Auth::user()->fio}}
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
