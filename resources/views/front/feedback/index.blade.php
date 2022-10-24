@extends('front.layouts.layout')

@section('title')
    <section class="py-5 text-center container">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Feedback page</h1>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="container mt-5">
        <div>{{ $feedbacks->links() }}</div>
    </div>

    <div class="bg-light py-5">
        <div class="container">
            @foreach($feedbacks as $feedback)
                <div class="col mb-5">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <p class="card-text"><span class="fw-bold">Пользователь:</span> {{ $feedback->user->name }}</p>
                            <p class="card-text"><span class="fw-bold">Отзыв:</span> {!! $feedback->description !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $feedback->created_at->format('d-m-Y') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @auth
        <div class="container py-3">
            <h2 class="fw-light mb-5">Добавить отзыв</h2>

            <form action="{{ route('feedback.store') }}" method="POST">
                @csrf

                <textarea class="form-control w-50 @error('description') is-invalid @enderror" name="description">{!! old('description') !!} </textarea>
                <button type="submit" class="btn btn-primary mt-3">Добавить</button>
            </form>
        </div>
    @endauth
@endsection
