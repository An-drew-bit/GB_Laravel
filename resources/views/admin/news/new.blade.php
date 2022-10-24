@extends('admin.layouts.layout')

@section('title')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новых новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-secondary">Список новостей</a>
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
                    <th scope="col">Status</th>
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
                        <td>{{ $new->status }}</td>

                        <td>
                            @can('approve', $new)
                                <form action="{{ route('admin.news.approve', ['id' => $new->id]) }}"
                                      method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-primary btn-sm text-white">Approve</button>
                                </form>
                            @endcan
                        </td>
                        <td>
                            @can('approve', $new)
                                <form action="{{ route('admin.news.reject', ['id' => $new->id]) }}"
                                      method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-danger ms-3 btn-sm">Reject</button>
                                </form>
                            @endcan
                        </td>
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
