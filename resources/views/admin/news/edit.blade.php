@extends('layouts.admin.main')

@section('title', 'News add')

@section('content')
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
    </div>
    <form action="{{ route('admin.news.update', ['news' => $news]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label" >Заголовок</label>
            <input class="form-control" name="title" value="{{ $news->title }}">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Выбор категории</label>
            <select name="category_id" class="form-control">
                <option value="">Выбрать</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="short_description" class=" form-label">Описание новости</label>
            <input class="form-control" name="short_description" value="{{ $news->short_description }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input class="form-control" name="image" type="file">
        </div>
        <div class="input-group">
            <span class="input-group-text">Текст статьи</span>
            <textarea class="form-control" name="description" value="{{ $news->description }}"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
