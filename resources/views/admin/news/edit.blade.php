@extends('admin.layouts.layout')

@section('title')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать: {{ $news->title }}</h1>
    </div>
@endsection

@section('content')
    <div class="container d-flex flex-column">
        <form action="{{ route('admin.news.update', ['news' => $news]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3 w-50">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       name="title" value="{{ $news->title }}">
            </div>

            <div class="mb-3 w-50">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror"
                       name="description" value="{{ $news->description }}">
            </div>

            <button type="submit" class="btn btn-primary mb-3">Изменить</button>
        </form>
    </div>
@endsection
