
@extends('layouts.app')

@section('content')
    <h1>Beschikbare Data</h1>

    <ul>
        @foreach($dates as $date)
            <li>{{ $date->date }} - {{ $date->time }}</li>
        @endforeach
    </ul>
@endsection

