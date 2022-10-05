@extends('welcome')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                @if(session()->has('successDelete'))
                    <div class="alert alert-success">Роль успешно удалена!</div>
                @endif
                <div class="border-1 border rounded-3 p-3">
                    <div class="row" style="align-items: center">
                        <h2 class="mt-3" style="width: 250px; margin-bottom: 20px;">Роли</h2>
                        <a href="{{route('admin.roles.create')}}" class="btn btn-success" style="height: 40px; width: 350px">Добавить новую роль</a>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Роль</th>
                            <th scope="col">Просмотреть</th>
                            <th scope="col">Изменить</th>
                            <th scope="col">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <th scope="col">{{$role->id}}</th>
                                <th scope="col">{{$role->roleName}}</th>
                                <th scope="col">{{$role->role}}</th>
                                <th scope="col"><a href="{{route('admin.roles.show',['role'=>$role->id])}}" class="btn btn-primary">Просмотреть</a></th>
                                <th scope="col"><a href="{{route('admin.roles.edit',['role'=>$role->id])}}" class="btn btn-primary">Редактировать</a></th>
                                <th scope="col">
                                    <form action="{{route('admin.roles.destroy',['role'=>$role->id])}}" method="POST">
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
