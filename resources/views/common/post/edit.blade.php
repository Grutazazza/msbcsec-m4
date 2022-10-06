@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('successPost'))
                    <div class="alert alert-success">Пост успешно изменён!</div>
                @endif
                <form method="post" action="{{route('common.post.update',['post'=>$post->id])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row mb-3">
                        <label for="inputName3" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$post->name}}" class="form-control @error('name') is-invalid @enderror" id="inputName3" aria-describedby="invalidNameFeedback">
                            @error('name')
                            <div id="invalidNameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Описание</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" value="{{$post->description}}" class="form-control @error('description') is-invalid @enderror" id="inputDescription" aria-describedby="invalidDescriptionFeedback">
                            @error('description')
                            <div id="invalidDescriptionFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputSmallDesc3" class="col-sm-2 col-form-label">Малое описание</label>
                        <div class="col-sm-10">
                            <input type="text" name="smalldesc" value="{{$post->smalldesc}}" class="form-control @error('smalldesc') is-invalid @enderror" id="inputSmallDesc3" aria-describedby="invalidSmallDescFeedback">
                            @error('smalldesc')
                            <div id="invalidSmallDescFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputSmallDesc3" class="col-sm-2 col-form-label">Тэги</label>
                        <div class="col-sm-10">
                            <input type="text" name="tags" value="{{$post->tags}}" class="form-control @error('tags') is-invalid @enderror" id="inputSmallDesc3" aria-describedby="invalidTagsFeedback">
                            @error('tags')
                            <div id="invalidTagsFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputFile" class="form-label">Выберите изображение для поста:</label>
                        <input name="photo" class="form-control @error('photo') is-invalid @enderror" type="file" id="inputFile" aria-describedby="invalidInputFile">
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
