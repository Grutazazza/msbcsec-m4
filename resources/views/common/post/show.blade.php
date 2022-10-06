@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8 d-flex flex-column align-items-center">
                <h2>{{$post->name}}</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <img width="700px" src="{{'/storage/app/public/'.$post->photo}}">
                    </li>
                    <li class="list-group-item">Описание: {{$post->description}}</li>
                    <li class="list-group-item">Дата создания: {{$post->dateofcreation}}</li>
                    <li class="list-group-item">Дата изменения: {{$post->dateofredact}}</li>
                    <li class="list-group-item">Теги: {{$post->tags}}</li>
                </ul>
                @if($post->user_id==\Illuminate\Support\Facades\Auth::user()->id)
                    <div class="center-block w-50 d-flex justify-content-around">
                        <a href="{{route('common.post.edit',['post'=>$post->id])}}" class="btn btn-outline-primary">Редактирование поста</a>
                        <form action="{{route('common.post.destroy',['post'=>$post->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                @endif

            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
