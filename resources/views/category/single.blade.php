@extends('layouts.layout')

@section('title', 'Categories::page')

@section('content')
    <div>
        <h1>Category {{ $category }} </h1>

        @foreach($catNews as $category)
            <a href="{{ route('singleNew', ['id' => $category['title']]) }}">{{ $category['title'] }}</a><br>
            <p>{{ $category['text'] }}</p>
            <p>{{ $category['author'] }}</p>
            <p>{{ $category['date'] }}</p>
            <hr>
        @endforeach
    </div>
@endsection
