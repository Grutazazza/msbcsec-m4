@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h2>Мой кабинет аккаунта</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ФИО: {{Auth::user()->fullname}}</li>
                    <li class="list-group-item">Логин: {{Auth::user()->dateofbirth}}</li>
                    <li class="list-group-item">Почта: {{Auth::user()->email}}</li>
                    <li class="list-group-item">
                        <img src="{{'storage/app/public/'.\Illuminate\Support\Facades\Auth::user()->photo}}">
                    </li>
                </ul>
                <a href="" class="btn btn-outline-primary">Редактирование аккаунта</a>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
