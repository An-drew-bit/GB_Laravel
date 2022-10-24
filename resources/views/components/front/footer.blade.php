<div class="container">
    <footer class="mt-5 border-top">
        <div class="d-flex justify-content-center mt-5">
            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('home') }}" class="nav-link p-0 text-muted">Главная</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('news.index') }}" class="nav-link p-0 text-muted">Новости</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('categories.index') }}" class="nav-link p-0 text-muted">Категории</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('feedback.index') }}" class="nav-link p-0 text-muted">Отзывы</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf

                    <h5>Подписывайтесь на нашу новостную рассылку</h5>
                    <p>Ежемесячный дайджест всего нового и интересного от нас.</p>
                    @auth
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="email" class="visually-hidden">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   placeholder="Email address">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    @endauth

                    @guest
                        <p class="text-info">Войдите что бы подписаться</p>
                    @endguest
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; By Andrew Makarov {{ date('Y') }}</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#">twitter</a></li>
                <li class="ms-3"><a class="link-dark" href="#">instagram</a></li>
                <li class="ms-3"><a class="link-dark" href="#">facebook</a></li>
            </ul>
        </div>
    </footer>
</div>
