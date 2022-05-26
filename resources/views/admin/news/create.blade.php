@extends('admin.layouts.layout')

@section('title')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
    </div>
@endsection

@section('content')
    <div class="container d-flex flex-column">
        <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 w-50">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3 w-50">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror"
                       name="description" value="{{ old('description') }}">
            </div>

            <div class="mb-3 w-50">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary mb-3">Добавить</button>
        </form>
    </div>
@endsection
