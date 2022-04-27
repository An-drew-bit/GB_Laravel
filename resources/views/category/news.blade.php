@extends('layouts.layout')

@section('title', 'News::page')

@section('content')
    <div>
        <h1>News {{ $news['news'] }} </h1>
        <div>
            <p>{{ $news['title'] }}</p>
            <p>{{ $news['text'] }}</p>
            <p>{{ $news['author'] }}</p>
            <p>{{ $news['date'] }}</p>
        </div>
    </div>
@endsection
