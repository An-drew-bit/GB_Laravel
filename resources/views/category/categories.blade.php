@extends('layouts.layout')

@section('title', 'Categories::page')

@section('content')
    <div>
        <h1>Categories</h1>

        @foreach($categories as $category)
            <a href="{{ route('show', ['id' => $category]) }}">{{ $category }}</a><br>
        @endforeach
    </div>
@endsection
