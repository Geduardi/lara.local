@extends('layouts.admin.main')

@section('title', 'Category edit')

@section('content')

    <form action="{{ route('admin.category.update', ['category' => $category]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Название категории</label>
            <input class="form-control" name="title" value="{{ $category->title }}">
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="description" class=" form-label">Описание категории</label>
            <input class="form-control" name="description" value="{{ $category->description }}">
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input class="form-control" name="image" type="file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
