@extends('layouts.layout')

@section('title', 'News page')

@section('content')

    @foreach($news as $new)
        <div>
            <div>Title: {{ $new['title'] }}</div>
            <div>Text: {{ $new['text'] }}</div>
            <div>Date: {{ $new['date'] }}</div><br>
        </div>
    @endforeach

@endsection
