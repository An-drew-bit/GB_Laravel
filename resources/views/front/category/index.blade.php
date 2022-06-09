@extends('front.layouts.layout')

@section('title')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Category page</h1>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="d-flex flex-row flex-wrap">
                @foreach($categories as $category)
                    <div class="col">
                        <h3><a href="{{ route('categories.view', ['slug' => $category->slug]) }}">{{ $category->title }}</a></h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
