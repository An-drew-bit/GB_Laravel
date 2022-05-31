@extends('admin.layouts.layout')

@section('title')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список Пользователей</h1>
    </div>
@endsection

@section('content')
    <div class="table-responsive">
        @if(count($users))
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Create</th>
                    <th scope="col">Role</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        <td>{{ $user->is_admin }}</td>


                        <td class="d-flex justify-content-end">
                            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}"
                               class="btn btn-primary btn-sm text-white">Edit</a>

                            <form action="{{ route('admin.users.destroy', ['user' => $user]) }}"
                                  method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger ms-3 btn-sm"
                                        onclick="return confirm('Подтвердите удаление')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @else
                    <div class="container text-center">
                        <h2 class="h4 fw-light">Еще нет зарегистрированых пользователей</h2>
                    </div>
                @endif
                </tbody>
            </table>
    </div>
@endsection
