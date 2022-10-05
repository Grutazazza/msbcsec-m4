@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('successRegister'))
                    <div class="alert alert-success">Пользователь успешно добавлен!</div>
                @endif
                <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail3" aria-describedby="invalidEmailFeedback">
                            @error('email')
                            <div id="invalidEmailFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">ФИО</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="inputName" aria-describedby="invalidNameFeedback">
                            @error('fullname')
                            <div id="invalidNameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword3" aria-describedby="invalidPasswordFeedback">
                            @error('password')
                            <div id="invalidPasswordFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword4" class="col-sm-2 col-form-label">Password confirmation</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="inputPassword4" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password')
                            <div id="invalidPasswordConfirmationFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputdate" class="col-sm-2 col-form-label">Дата рождения</label>
                        <div class="col-sm-10">
                            <input type="date" name="dateofbirth" class="form-control @error('dateofbirth') is-invalid @enderror" id="inputdate" aria-describedby="invalidDateFeedback">
                            @error('dateofbirth')
                            <div id="invalidDateFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputFile" class="form-label">Выберите изображение для товара:</label>
                        <input name="photo" class="form-control @error('photo') is-invalid @enderror" type="file" id="inputFile" aria-describedby="invalidInputFile">
                        @error('photo')
                        <div id="invalidInputFile" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputRole" class="col-sm-2 col-form-label">Roles</label>
                        <select name="role" class="form-control" id="inputRole">
                            @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->id}}" >{{$role->role}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input @error('confirmation_polity') is-invalid @enderror" name="confirmation_polity" type="checkbox" id="gridCheck1" aria-describedby="invalidPasswordConfirmationFeedback">
                            <label class="form-check-label" for="gridCheck1">
                                Example checkbox
                            </label>
                            @error('confirmation_polity')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
