@extends('front.layouts.layout')

@section('title')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Add news</h1>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container d-flex flex-column">
        <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 w-50">
                <label for="title" class="form-label">Заголовок</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3 w-50">
                <label for="content" class="form-label">Контент</label>
                <textarea class="form-control" name="content" rows="3">{!! old('content') !!} </textarea>
            </div>

            <label class="form-label" for="category_id">Категория</label>
            <select class="form-control mb-2 w-50" id="category_id" name="category_id">
                @foreach($categories as $key => $values)
                    <option value="{{ $key }}">{{ $values }}</option>
                @endforeach
            </select>

            <div class="mb-3 w-50">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary mb-3">Add</button>
        </form>
    </div>
@endsection
