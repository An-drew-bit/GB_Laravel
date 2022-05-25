<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>GeekBrains Laravel</title>

    <link href="{{ asset('assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<x-front.header></x-front.header>

<main>

    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>

    @yield('title')

    @yield('content')

</main>

<x-front.footer></x-front.footer>

<script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
