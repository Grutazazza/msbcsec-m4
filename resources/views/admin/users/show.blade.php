@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8 d-flex flex-column align-items-center">
                <h2>Аккаунт пользователя {{$user->fullname}}</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <img width="700px" src="{{'/storage/app/public/'.$user->photo}}">
                    </li>
                    <li class="list-group-item">ФИО: {{$user->fullname}}</li>
                    <li class="list-group-item">Почта: {{$user->email}}</li>
                    <li class="list-group-item">Дата рождения: {{$user->dateofbirth}}</li>
                    <li class="list-group-item">Роль: {{$user->role->roleName}}</li>
                </ul>
                <div class="center-block w-50 d-flex justify-content-around">
                    <a href="{{route('admin.users.edit',['user'=>$user->id])}}" class="btn btn-outline-primary">Редактирование аккаунта</a>
                    <form action="{{route('admin.users.destroy',['user'=>$user->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>

            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
