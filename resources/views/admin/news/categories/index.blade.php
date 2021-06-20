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
                        <img src="{{ $category->image }}" class="card-img-top" alt="{{ $category->title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $category->title }}</h4>
                            <p class="card-subtitle mb-2 text-muted">#ID {{ $category->id }}</p>
                            <p class="card-text">{{ $category->description }}</p>
                            <a href="{{ route('admin.category.show', ['category' => $category]) }}" class="btn btn-dark" >Читать</a>
                            <a href="{{ route('admin.category.edit', ['category' => $category]) }}" class="btn btn-primary" >Ред.</a>
                            <a href="{{ route('admin.category.index', ['category' => $category]) }}" onclick="event.preventDefault();
                                document.getElementById(
                                'delete-form-{{$category->id}}').submit();" class="btn btn-light" id="delete-btn">Удалить</a>
                            <form id="delete-form-{{$category->id}}"
                                   action="{{route('admin.category.destroy', $category)}}"
                                  method="post">
                                @csrf @method('DELETE')
                            </form>

                        </div>
                    </div>
                </div>
                @php $counter++ @endphp
                @if($counter % 3 == 0)
            </div>
        @endif
{{--        todo Сделать удаление через fetch--}}
{{--        <script type="text/javascript">--}}
{{--            function deleteCategory(data) {--}}
{{--                console.log(data);--}}

{{--                return  fetch({{ route('admin.category.destroy', ['category' => $category]) }}, {--}}
{{--                    headers: {--}}
{{--                        "X-CSRF-TOKEN": @csrf--}}
{{--                    },--}}
{{--                    method: 'delete',--}}
{{--                    body: data--}}
{{--                        // .then((data) => {--}}
{{--                        //     form.reset();--}}
{{--                        //     window.location.href = redirect;--}}
{{--                        // })--}}
{{--                        .then(function(response) {--}}

{{--                            console.log(response.headers.get('Content-Type'));--}}
{{--                            console.log(response.headers.get('Date'));--}}

{{--                            console.log(response.status);--}}
{{--                            console.log(response.statusText);--}}
{{--                            console.log(response.type);--}}
{{--                            console.log(response.url);--}}
{{--                        })--}}
{{--                        .catch(function(error) {--}}
{{--                            console.log(error);--}}
{{--                        })--}}

{{--                })--}}
{{--            }--}}
{{--            document.getElementById('delete-btn').addEventListener('click', deleteCategory({{$category->id}}), false);--}}
{{--        </script>--}}
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
