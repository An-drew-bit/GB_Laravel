<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/admin/css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

<x-admin.header></x-admin.header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.index')) active @endif"
                           aria-current="page" href="{{ route('admin.index') }}">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Главная
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.category.*')) active @endif"
                           href="{{ route('admin.category.index') }}">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Категории
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif"
                           href="{{ route('admin.news.index') }}">
                            <span data-feather="shopping-cart" class="align-text-bottom"></span>
                            Новости
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif"
                           href="{{ route('admin.users.index') }}">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Пользователи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('admin.resource.*')) active @endif"
                           href="{{ route('admin.resource.index') }}">
                            <span data-feather="users" class="align-text-bottom"></span>
                            Ресурсы
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            @yield('title')

            <div class="container">
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

            @yield('content')

        </main>
    </div>
</div>


<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
