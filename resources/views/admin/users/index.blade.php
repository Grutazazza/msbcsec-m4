@extends('welcome')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                @if(session()->has('successDelete'))
                    <div class="alert alert-success">Пользователь успешно удалён!</div>
                @endif
                <div class="border-1 border rounded-3 p-3">
                    <div class="row" style="align-items: center">
                        <h2 class="mt-3" style="width: 250px; margin-bottom: 20px;">Пользователи</h2>
                        <a href="{{route('admin.users.create')}}" class="btn btn-success" style="height: 40px; width: 350px">Добавить нового пользователя</a>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">email</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Дата рождения</th>
                            <th scope="col">Роль</th>
                            <th scope="col">Создан</th>
                            <th scope="col">Изменён</th>
                            <th scope="col">Просмотреть</th>
                            <th scope="col">Изменить</th>
                            <th scope="col">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="col">{{$user->id}}</th>
                                <th scope="col">{{$user->email}}</th>
                                <th scope="col">{{$user->fullname}}</th>
                                <th scope="col">{{$user->dateofbirth}}</th>
                                <th scope="col">{{$user->role->roleName}}</th>
                                <th scope="col">{{$user->created_at}}</th>
                                <th scope="col">{{$user->updated_at}}</th>
                                <th scope="col"><a href="{{route('admin.users.show',['user'=>$user->id])}}" class="btn btn-primary">Просмотреть</a></th>
                                <th scope="col"><a href="{{route('admin.users.edit',['user'=>$user->id])}}" class="btn btn-primary">Редактировать</a></th>
                                <th scope="col">
                                    <form action="{{route('admin.users.destroy',['user'=>$user->id])}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
