@extends('admin.layouts.layout')

@section('title')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список url</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.resource.create') }}" class="btn btn-sm btn-outline-secondary">Добавить url</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        @if(count($resources))
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Url</th>
                </tr>
                </thead>
                <tbody>

                @foreach($resources as $resource)
                    <tr>
                        <td>{{ $resource->id }}</td>
                        <td>{{ $resource->url }}</td>

                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.resource.edit', ['resource' => $resource->id]) }}"
                               class="btn btn-primary btn-sm text-white">Edit</a>

                            <form action="{{ route('admin.resource.destroy', ['resource' => $resource->id]) }}"
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
                        <h2 class="h4 fw-light">Url's пока нет..</h2>
                    </div>
                @endif
                </tbody>
            </table>

            <div class="container mt-3">
                <div>{{ $resources->links() }}</div>
            </div>
    </div>
@endsection
