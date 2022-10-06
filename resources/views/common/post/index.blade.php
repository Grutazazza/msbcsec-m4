@extends('welcome')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="row">
                Создать новый пост:
                <a href="{{route('common.post.create')}}" class="btn btn-primary">Создать</a>
            </div>
            @if(session()->has('successDelete'))
                <div class="alert alert-success">Пост успешно удалён!</div>
            @endif
            <div class="col-12 p-3">
                <h2>Все посты</h2>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-4 mb-4">
                            <div class="card" style="width: 100%;">
                                <img src="/public/storage/{{$post->photo}}" class="card-img-top" alt="{{$post->name}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->name}}</h5>
                                    <p class="card-text">{{$post->smalldesc}}</p>
                                    <p class="card-text">Создано: {{$post->dateofcreation}}</p>
                                    <p class="card-text">Отредактированно: {{$post->dateofredact}}</p>
                                    <p class="card-text">Тэги: {{$post->tags}}</p>
                                    <div class="row d-flex justify-content-evenly">
                                        <a href="{{route('post',['post'=>$post->id])}}" class="btn btn-primary" style="width: 200px">Посмотреть</a>
                                        @if($post->user_id==\Illuminate\Support\Facades\Auth::user()->id)
                                            <form action="{{route('common.post.destroy',['post'=>$post->id])}}" style="width: 85px" method="POST">
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
