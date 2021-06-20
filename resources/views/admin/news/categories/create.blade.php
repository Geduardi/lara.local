@extends('layouts.admin.main')

@section('title', 'Category add')

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

    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название категории</label>
            <input class="form-control" name="title" value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <label for="description" class=" form-label">Описание категории</label>
            <input class="form-control" name="description" value="{{old('description')}}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input class="form-control" name="image" type="file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


