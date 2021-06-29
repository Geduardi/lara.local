@extends('layouts.main')

@section('title', 'Главная страница')
{{--todo Сделать пагинацию--}}
@section('content')
    @if(session()->has('errors'))
        <div class="alert alert-danger">
            {{ session()->get('errors') }}
        </div>
    @endif




@endsection
