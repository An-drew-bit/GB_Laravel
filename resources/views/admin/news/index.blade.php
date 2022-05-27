@extends('admin.layouts.layout')

@section('title')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        @if(count($news))
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Slug</th>
                </tr>
                </thead>
                <tbody>

                @foreach($news as $new)
                    <tr>
                        <td>{{ $new->id }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->description }}</td>
                        <td>{{ $new->user_id }}</td>
                        <td>{{ $new->category_id }}</td>
                        <td>{{ $new->slug }}</td>

                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $new->id]) }}"
                               class="btn btn-primary btn-sm text-white">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.news.destroy', ['news' => $new->id]) }}"
                                  method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger ms-3 btn-sm"
                                        onclick="return confirm('Подтвердите удаление')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @else
                    <div class="container text-center">
                        <h2 class="h4 fw-light">Новостей пока нет..</h2>
                    </div>
                @endif
                </tbody>
            </table>

            <div class="container mt-3">
                <div>{{ $news->links() }}</div>
            </div>
    </div>
@endsection
