@extends('layouts.app')

@section('page-title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h2>Welkom, {{ Auth::user()->first_name }}!</h2>

        <div>
            <h3>Dit zijn je reserveringen van vandaag en morgen:</h3>
            <!-- Voeg hier de code toe om de reserveringen van vandaag en morgen weer te geven -->
        </div>

        <a href="{{ route('available-dates.create') }}" class="btn btn-success">Nieuwe beschikbare datum toevoegen</a>

        <div>
            <h3>Beschikbare data:</h3>
            <ul>
                @foreach ($availableDates as $availableDate)
                    <li>{{ $availableDate->date }}</li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route('reservations.index') }}" class="btn btn-primary">Bekijk alle reserveringen</a>
    </div>
@endsection


