<header>
    <div class="px-3 py-2 bg-dark text-white">
        <div class="container">
            <div class="blog-header lh-1 py-3">
                <div class="text-center">
                    <a class="blog-header-logo text-white" href="{{ route('home') }}">Large</a>
                </div>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="{{ route('home') }}" class="nav-link @if(request()->routeIs('home')) text-secondary @else text-white @endif">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"/></svg>
                            Главная
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}" class="nav-link @if(request()->routeIs('news.*')) text-secondary @else text-white @endif">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"/></svg>
                            Новости
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" class="nav-link @if(request()->routeIs('categories.*')) text-secondary @else text-white @endif">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"/></svg>
                            Категории
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('feedback.index') }}" class="nav-link @if(request()->routeIs('feedback.*')) text-secondary @else text-white @endif">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"/></svg>
                            Отзывы
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3">
        <div class="container d-flex flex-wrap justify-content-center">
            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search"
                  method="GET" action="{{ route('search') }}">

                <input type="search" name="search" class="form-control
                    @error('search') is-invalid @enderror" placeholder="Search..." aria-label="Search">
            </form>
            @auth
                <div class="text-end">
                    @if($name->is_admin)
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">Админка</a>
                    @else
                        <a href="{{ route('home') }}" class="btn btn-primary">Личный кабинет</a>
                    @endif
                        <a href="{{ route('logout') }}" class="btn btn-light text-dark me-2">Выйти</a>
                </div>
            @endauth

            @guest
                <div class="text-end">
                    <a href="{{ route('login.showForm') }}" class="btn btn-light text-dark me-2">Войти</a>
                    <a href="{{ route('register.showForm') }}" class="btn btn-primary">Регистрация</a>
                </div>
            @endguest
        </div>
    </div>
</header>
