@extends('layouts.admin.main')

@section('title', 'Category admin')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif
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
                            <p class="card-subtitle mb-2 text-muted">#ID {{ $category->id }}</p>
                            <p class="card-text">{{ $category->description }}</p>
                            <a href="{{ route('admin.category.show', ['category' => $category]) }}" class="btn btn-dark" >Читать</a>
                            <a href="{{ route('admin.category.edit', ['category' => $category]) }}" class="btn btn-primary" >Ред.</a>
                            <a href="{{ route('admin.category.destroy', ['category' => $category]) }}" class="btn btn-light" >Удалить</a>
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
    {{ $categories->links() }}

@endsection
