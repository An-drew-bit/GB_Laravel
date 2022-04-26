@extends('layouts.layout')

@section('title', 'News::page')

@section('content')
    <div>
        <h1>News:</h1>

        @foreach($news as $new)
            <div>
                <p>Title: {{ $new['title'] }}</p>
                <p>Title: {{ $new['text'] }}</p>
                <p>Title: {{ $new['date'] }}</p>
            </div>
        @endforeach
    </div>
@endsection
