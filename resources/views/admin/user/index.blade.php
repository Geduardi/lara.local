@extends('layouts.admin.main')

@section('title', 'Пользователи')

@section('content')
    @if(session()->has('errors'))
        <div class="alert alert-danger">
            {{ session()->get('errors') }}
        </div>
    @endif
    <div class="row mt-3 mx-auto ">
        <a href="{{ route('admin.user.create') }}" >
            <div class="col-md-6">
                <i class="fas fa-plus-circle card-img-top" style="font-size: 100px"></i>
            </div>
            <div class="col-md-6">
                <h2 class="badge badge-light">Добавить</h2>
            </div>
        </a>
    </div>
    @forelse($users as $user)
        <div class="row mt-3">
            <div class="col-md-6 module">
                <h2><a href="{{ route('admin.user.show', ['user' => $user]) }}" class="badge badge-light">{{ $user->name }}</a></h2>
                <p class="line-clamp">#ID {{ $user->id }}</p>
            </div>

            {{--            todo выровнять кнопки--}}
            <a href="{{ route('admin.user.edit', ['user' => $user]) }}" class="btn btn-primary" >Ред.</a>
            <a href="{{ route('admin.user.index') }}" onclick="event.preventDefault();
                document.getElementById(
                'delete-form-{{$user->id}}').submit();" class="btn btn-light" id="delete-btn">Удалить</a>
            <form id="delete-form-{{$user->id}}"
                  action="{{route('admin.user.destroy', $user)}}"
                  method="post">
                @csrf @method('DELETE')
            </form>
            {{--            todo Сделать через fetch--}}
        </div>
    @empty
        <h1>Нет новостей</h1>
    @endforelse
@endsection
