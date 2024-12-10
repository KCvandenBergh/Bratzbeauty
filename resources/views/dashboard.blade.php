
@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <h1>Welkom {{ Auth::user()->name }}!</h1>

    <a href="{{ route('reservations.create') }}">
        <button>Maak een afspraak</button>
    </a>

    <h2>Aankomende Afspraken</h2>
{{--    @if(count($upcomingReservations) > 0)--}}
    @if(isset($upcomingReservations) && count($upcomingReservations) > 0)
        <ul>
            @foreach($upcomingReservations as $reservation)
                <li>{{ $reservation->reservation_date }}: {{ $reservation->description }}</li>
            @endforeach
        </ul>
    @else
        <p>Geen aankomende afspraken.</p>
    @endif

    <!-- Knop voor review -->
    @if ($loginCount >= 5)
        <a href="{{ route('reviews.create') }}" class="btn btn-primary">Plaats een Review</a>
    @else
        <button class="btn btn-secondary" disabled> Plaats een Review (Je moet minstens 5 keer inloggen)</button>
    @endif
    </body>
@endsection


