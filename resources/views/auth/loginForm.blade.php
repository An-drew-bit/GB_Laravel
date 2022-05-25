@extends('auth.layouts.layout')

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <a href="{{ route('home') }}">
            <img class="mb-4" src="{{ asset('assets/front/img/bootstrap-logo.svg') }}" alt="" width="72" height="57">
        </a>
        <h1 class="h3 mb-3 fw-normal">Вход</h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>

        <div class="mb-3">
            <div><a href="{{ route('register.showForm') }}">Нет аккаунта? Зарегистрируйтесь</a></div>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
    </form>
@endsection
