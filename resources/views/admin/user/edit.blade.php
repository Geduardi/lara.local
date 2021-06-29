@extends('layouts.admin.main')

@section('title', 'User add')

@section('content')


    <form action="{{ route('admin.user.update', ['user' => $user]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label" >Имя пользователя</label>
            <input class="form-control" name="name" value="{{ $user->name }}">
        </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="email" class=" form-label">Эл.почта</label>
            <input class="form-control" name="email" type="email" value="{{ $user->email }}">
        </div>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

{{--        <div class="mb-3">--}}
{{--            <label for="password" class=" form-label">Пароль</label>--}}
{{--            <input class="form-control" name="password" type="password" value="{{ 'password' }}">--}}
{{--        </div>--}}

{{--        @error('password')--}}
{{--        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--        @enderror--}}

{{--        <div class="mb-3">--}}
{{--            <label for="password_confirmation" class=" form-label">Пароль</label>--}}
{{--            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{ 'password' }}">--}}
{{--        </div>--}}

{{--        @error('password_confirmation')--}}
{{--        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--        @enderror--}}

        <div class="mb-3">
            <label for="is_admin" class=" form-label">Админ</label>
            <input class="form-control" name="is_admin" type="checkbox" value="1"
            @if($user->is_admin)
                checked
                @endif
                >
        </div>

        @error('is_admin')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
