@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1>Авторизация пользователя</h1>
                @auth
                    <div class="alert alert-success">Вы успешно авторизованы.</div>
                @endauth
                @guest
                    @error('auth')
                    <div class="alert alert-danger">Логин или пароль не верный</div>
                    @enderror
                    <form method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="inputLogin" class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputLogin" aria-describedby="invalidLoginFeedback"  value="{{old('login')}}">
                            @error('email')
                            <div id="validationLoginFeedback" class="invalid-feedback">
                                {{$message}}.
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Пароль:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" aria-describedby="invalidPasswordFeedback">
                            @error('password')
                            <div id="validationPasswordFeedback" class="invalid-feedback">
                                {{$message}}.
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Авторизация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
