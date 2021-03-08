@extends('layouts.admin.main')

@section('title', 'Category admin')

@section('content')

    @php $counter = 0; @endphp
    @foreach($categories as $category)
        @if($counter % 3 == 0)
            <div class="row mb-3">
                @endif
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem; height: 420px">
                        <img src="{{ $category['photo'] }}" class="card-img-top" alt="{{ $category['name'] }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $category['name'] }}</h4>
                            <p class="card-text">#ID {{ $category['id'] }}</p>
                            <p class="card-text">{{ $category['description'] }}</p>
                            <a href="{{ route('category.news', ['categoryId' => $category['id']]) }}" class="btn btn-dark" style="position: absolute; bottom: 20px">Читать</a>
                        </div>
                    </div>
                </div>
                @php $counter++ @endphp
                @if($counter % 3 == 0)
            </div>
        @endif
    @endforeach
    <div class="col-md-4">
        <a href="{{ route('admin.category.create') }}" >
        <div class="card mx-auto text-center card-block d-flex" style="width: 18rem; height: 420px">
{{--            <img src="{{ $category['photo'] }}" class="card-img-top" alt="{{ $category['name'] }}">--}}

            <div class="card-body align-items-center d-flex justify-content-center">
                <i class="fas fa-plus-circle card-img-top" style="font-size: 100px"></i>
            </div>
        </div>
        </a>
    </div>


@endsection
