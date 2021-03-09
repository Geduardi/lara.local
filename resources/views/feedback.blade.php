@extends('layouts.main')

@section('title', 'Feedback')

@section('content')
    <form action="#" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label" >Имя</label>
            <input class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="input-group">
            <span class="input-group-text">Отзыв</span>
            <textarea class="form-control" name="text" value="{{old('text')}}"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


