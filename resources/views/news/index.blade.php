@extends('layouts.main')

@section('title', 'News')

@section('content')


    @forelse ($news as $oneNews)
        <div class="row mt-3">
            <div class="col-md-6">
                <img src="{{ $oneNews->image }}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-6 module">
                <h2><a href="{{ route('news.id', ['id' => $oneNews->id]) }}" class="badge badge-light">{{ $oneNews->title }}</a></h2>
                <p class="line-clamp">{{ $oneNews->short_description }}</p>
            </div>
        </div>
        <hr>
    @empty
        <h1>Новостей нет.</h1>
    @endforelse



@endsection
