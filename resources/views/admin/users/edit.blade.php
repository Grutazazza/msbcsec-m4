@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('success'))
                    <div class="alert alert-success">Пользователь успешно отредактирован!</div>
                @endif
                <form method="post" action="{{route('admin.users.update',['user'=>$user->id])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" id="inputEmail3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('email')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ФИО</label>
                            <input type="text" name="fullname" value="{{$user->fullname}}" class="form-control @error('fullname') is-invalid @enderror" id="inputEmail3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('fullname')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Roles</label>
                        <select name="role" class="form-control" id="inputRole">
                            @foreach(\App\Models\Role::all() as $role)
                                <option @if($user->role->role==$role->role) selected @endif  value="{{$role->id}}" >{{$role->roleName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
