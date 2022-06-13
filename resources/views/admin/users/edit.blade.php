@extends('admin.layouts.layout')

@section('title')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать: {{ $user->name }}</h1>
    </div>
@endsection

@section('content')
    <div class="container d-flex flex-column">
        <form action="{{ route('admin.users.update', ['user' => $user]) }}" method="post">
            @csrf
            @method('PUT')

            <label class="form-label" for="is_admin">Role</label>
            <select class="form-control mb-2 w-50" id="role" name="is_admin">
                    <option value="{{ $user->is_admin }}">{{ $user->is_admin }}</option>
                    <option>@if($user->is_admin == 2) 0 @else 2 @endif</option>
            </select>

            <button type="submit" class="btn btn-primary mb-3">Изменить</button>
        </form>
    </div>
@endsection
