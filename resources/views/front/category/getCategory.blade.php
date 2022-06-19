@extends('front.layouts.layout')

@section('title')
    <section class="py-5 text-center container">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Категория {{ $category->title }}</h1>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="bg-light py-5">
        <div class="container">
            @forelse($news as $new)
                <div class="col mb-5">
                    <div class="card shadow-sm">

                        <div class="card-body">
                            <p class="card-text"><span class="fw-bold">Новость:</span> {{ $new->title }}</p>
                            <p class="card-text"><span class="fw-bold">Описание:</span> {{ $new->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('news.view', ['slug' => $new->slug]) }}" type="button"
                                       class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                </div>
                                <small class="text-muted">{{ $new->created_at->format('d-m-Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container text-center">
                    <h2 class="fw-light">Новостей пока нет</h2>
                </div>
            @endforelse
        </div>
    </div>

    <div class="container mt-5">
        <div>{{ $news->links() }}</div>
    </div>

@endsection
