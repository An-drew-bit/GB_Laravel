<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>GeekBrains Laravel</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<x-front.header></x-front.header>

<main>

    @yield('title')

    @yield('content')

</main>

<x-front.footer></x-front.footer>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
