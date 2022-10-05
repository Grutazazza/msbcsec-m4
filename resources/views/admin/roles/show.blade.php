@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8 d-flex flex-column align-items-center">
                <h2>Роль {{$role->roleName}}</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">ID: {{$role->id}}</li>
                    <li class="list-group-item">Название: {{$role->roleName}}</li>
                    <li class="list-group-item">Роль: {{$role->role}}</li>
                </ul>
                <div class="center-block w-50 d-flex justify-content-around">
                    <a href="{{route('admin.roles.edit',['role'=>$role->id])}}" class="btn btn-outline-primary">Отредактировать</a>
                    <form action="{{route('admin.roles.destroy',['role'=>$role->id])}}" method="POST">
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
