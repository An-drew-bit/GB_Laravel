@extends('front.layouts.layout')

@section('title')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать: {{ $user->name }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container d-flex flex-column">
        <form action="{{ route('profile.update', ['profile' => $user->id]) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 w-50">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ $user->name }}">
            </div>

            <div class="mb-3 w-50">
                <label for="last_name" class="form-label">Фамилия</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                       name="last_name" value="{{ $user->last_name }}">
            </div>

            <div class="mb-3 w-50">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ $user->email }}">
            </div>

            <div class="mb-3 w-50">
                <label for="avatar" class="form-label">Аватар</label>
                <input type="file" class="form-control" name="avatar">
            </div>
            <div class="mb-3 w-50">
                @if($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" alt="image" class="w-50 h-25">
                @endif
            </div>

            <button type="submit" class="btn btn-primary mb-3">Изменить</button>
        </form>
    </div>
@endsection
