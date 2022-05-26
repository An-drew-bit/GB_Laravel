@extends('front.layouts.layout')

@section('title')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Home page</h1>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @forelse($news as $new)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text"><span class="fw-bold">Новость:</span> {{ $new->title }}</p>
                                <p class="card-text"><span class="fw-bold">Описание:</span> {{ $new->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('news.view', ['slug' => $new->slug]) }}" type="button"
                                           class="btn btn-sm btn-outline-secondary">View</a>
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

        @auth
            <div class="container d-flex justify-content-center">
                <div class="row mt-5">
                    <a href="{{ route('news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить</a>
                </div>
            </div>
        @endauth

    </div>
@endsection
