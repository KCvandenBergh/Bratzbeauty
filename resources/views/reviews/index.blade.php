@extends('layouts.app')

@section('page-title', 'Reviews')

@section('content')
    <h1>Beoordelingen</h1>

    @foreach($reviews as $review)
        <div>
            <h3>{{ $review->name }}</h3>
            <p>{{ $review->content }}</p>
            <p>Score: {{ $review->score }}/10</p>
        </div>
        <hr>
    @endforeach
@endsection

