@extends('layouts.admin.main')

@section('title', 'News add')

@section('content')


    <form action="{{ route('admin.news.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label" >Заголовок</label>
            <input class="form-control" name="title" value="{{old('title')}}">
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="category_id" class="form-label">Выбор категории</label>
            <select name="category_id" class="form-control">
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option
                        @if (old('category_id') == $category->id)
                        selected="selected"
                        @endif
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="short_description" class=" form-label">Описание новости</label>
            <input class="form-control" name="short_description" value="{{old('short_description')}}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input class="form-control" name="image" type="file">
        </div>
        <div class="input-group">
            <span class="input-group-text">Текст статьи</span>
            <textarea class="form-control" name="description" value="{{old('description')}}"></textarea>
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


