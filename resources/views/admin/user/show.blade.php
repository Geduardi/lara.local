@extends('layouts.admin.main')

@section('title', 'User info')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Имя: {{ $user->name }}</h1>
            <h4 class="text-center">ID: {{ $user->id }}</h4>
            <p class="text-center">Почта: {{ $user->email }}</p>
            <p class="text-center">Админ:
                @if($user->is_admin)
                    Да
                @else
                    Нет
                @endif
            </p>
        </div>
    </div>
@endsection
