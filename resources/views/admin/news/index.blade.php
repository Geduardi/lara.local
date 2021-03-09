@extends('layouts.admin.main')

@section('title', 'News admin')

@section('content')
    <div class="row mt-3 mx-auto ">
        <a href="{{ route('admin.news.create') }}" >
        <div class="col-md-6">
            <i class="fas fa-plus-circle card-img-top" style="font-size: 100px"></i>
        </div>
            <div class="col-md-6">
                <h2 class="badge badge-light">Добавить новость</h2>
            </div>
        </a>
    </div>
    <hr>

    @forelse ($news as $oneNews)
        <div class="row mt-3">
            <div class="col-md-6">
                <img src="{{ $oneNews->image }}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-6 module">
                <h2><a href="{{ route('news.id', ['id' => $oneNews->id]) }}" class="badge badge-light">{{ $oneNews->title }}</a></h2>
                <p class="line-clamp">#ID {{ $oneNews->id }}</p>
                <p class="line-clamp">{{ $oneNews->short_description }}</p>
            </div>
        </div>
        <hr>
    @empty
        <h1>Новостей нет.</h1>
    @endforelse



@endsection
