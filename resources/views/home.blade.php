<!-- dashboard.blade.php -->

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
    @if(count($upcomingAppointments) > 0)
        <ul>
            @foreach($upcomingAppointments as $appointment)
                <li>{{ $appointment->appointment_date }}: {{ $appointment->description }}</li>
            @endforeach
        </ul>
    @else
        <p>Geen aankomende afspraken.</p>
    @endif
    </body>
@endsection


