@extends('layouts.main')

@section('title', 'Order')

@section('content')
    <form action="#" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label" >Имя заказчика</label>
            <input class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label" >Телефон</label>
            <input class="form-control" name="tel" value="{{old('tel')}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control"  name="email">
        </div>
        <div class="mb-3">
            <label for="info" class="form-label">Информация о заказе</label>
            <input type="info" class="form-control"  name="info">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection


