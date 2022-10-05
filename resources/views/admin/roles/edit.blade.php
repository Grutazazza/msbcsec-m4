@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('success'))
                    <div class="alert alert-success">Роль успешно отредактирована!</div>
                @endif
                <form method="post" action="{{route('admin.roles.update',['role'=>$role->id])}}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <div class="mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Роль</label>
                            <input type="text" name="role" value="{{$role->role}}" class="form-control @error('role') is-invalid @enderror" id="role" aria-describedby="roleFeedback">
                            @error('role')
                            <div id="roleFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="roleName" class="col-sm-2 col-form-label">Наименование роли</label>
                            <input type="text" name="roleName" value="{{$role->roleName}}" class="form-control @error('roleName') is-invalid @enderror" id="roleName" aria-describedby="roleNameFeedback">
                            @error('roleName')
                            <div id="roleNameFeedback" class="invalid-feedback">
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
