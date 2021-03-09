@extends('layouts.main')

@section('title', 'Category page')

@section('content')

    @php $counter = 0; @endphp
    @foreach($categories as $category)
        @if($counter % 3 == 0)
            <div class="row mb-3">
        @endif
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem; height: 420px">
                        <img src="{{ $category->image }}" class="card-img-top" alt="{{ $category->title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $category->title }}</h4>
                            <p class="card-text">{{ $category->description }}</p>
                            <a href="{{ route('category.news', ['categoryId' => $category->id]) }}" class="btn btn-dark" style="position: absolute; bottom: 20px">Читать</a>
                        </div>
                    </div>
                </div>
        @php $counter++ @endphp
        @if($counter % 3 == 0)
            </div>
        @endif
    @endforeach

@endsection
