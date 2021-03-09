@extends('layouts.main')

@section('title', 'News page')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">{{ $news->title }}</h1>
            <img src="{{ $news->image }}" class="img-fluid" alt="Responsive image">
            <p class="text-justify">{{ $news->description }}</p>
        </div>
    </div>
@endsection
