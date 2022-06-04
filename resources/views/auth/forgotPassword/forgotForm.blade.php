@extends('auth.layouts.layout')

@section('content')
    <form action="{{ route('login.forgot') }}" method="POST">
        @csrf

        <a href="{{ route('home') }}">
            <img class="mb-4" src="{{ asset('assets/front/img/bootstrap-logo.svg') }}" alt="" width="72" height="57">
        </a>

        <h1 class="h3 mb-3 fw-normal">Восстановление пароля</h1>

        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" placeholder="Email">
            <label for="email">Email</label>
        </div>

        <div class="mb-3">
            <div><a href="{{ route('login.showForm') }}">Вспомнил, отменить</a></div>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Восстановить</button>
        <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
    </form>
@endsection
