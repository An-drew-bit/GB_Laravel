@extends('front.layouts.layout')

@section('title')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Личный кабинет {{ $user->name }}</h1>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="d-flex flex-column">
                <p class="card-text fw-light h3"><span class="fw-bold">Имя:</span> {{ $user->name }}</p>
                <p class="card-text fw-light h3"><span class="fw-bold">Фамилия:</span> {{ $user->last_name }}</p>
                <p class="card-text fw-light h3"><span class="fw-bold">Email:</span> {{ $user->email }}</p>
                <div>
                    <p class="card-text fw-light h3"><span class="fw-bold">Аватар:</span></p>
                        @if($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" alt="avatar">
                        @else
                            Пусто
                        @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex mt-3">
            <a href="{{ route('profile.edit', ['profile' => $user]) }}"
               class="btn btn-sm btn-outline-secondary">Редактировать</a>

            <form action="{{ route('profile.destroy', ['profile' => $user]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-outline-secondary ms-5"
                        onclick="return confirm('Подтвердите удаление')">Удалить профиль</button>
            </form>
        </div>
    </div>
@endsection
