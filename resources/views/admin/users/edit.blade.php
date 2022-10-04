@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @isset($product)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" id="inputEmail3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('email')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ФИО</label>
                        <div class="col-sm-10">
                            <input type="text" name="fullname" value="{{$user->fullname}}" class="form-control @error('fullname') is-invalid @enderror" id="inputEmail3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('fullname')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror" id="inputPassword3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password confirmation</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="inputPassword3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Roles</label>
                        <select name="role" class="form-control" id="inputRole">
                            @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->role}}" >{{$role->role}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Дата рождения</label>
                        <div class="col-sm-10">
                            <input type="date" name="dateofbirth" value="{{old($user->dateofbirth, date('Y-m-d'))}}" class="form-control @error('dateofbirth') is-invalid @enderror" id="inputPassword3" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('dateofbirth')
                            <div id="invalidInputFile" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputFile" class="form-label">Выберите изображение для товара:</label>
                        <input name="photo" class="form-control @error('photo') is-invalid @enderror" type="file" id="inputFile" aria-describedby="invalidInputFile" aria-describedby="invalidPasswordConfirmationFeedback">
                        @error('photo')
                        <div id="invalidInputFile" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection
