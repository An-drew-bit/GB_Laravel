@extends('auth.layouts.layout')

@section('content')
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf

        <a href="{{ route('home') }}">
            <img class="mb-4" src="{{ asset('assets/front/img/bootstrap-logo.svg') }}" alt="" width="72" height="57">
        </a>

        <div class="container">
            <p class="fw-normal">Необходимо подтверждение email</p>
            <p class="fw-normal">Письмо отправлено в логи</p>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить повторно</button>
        <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
    </form>
@endsection
