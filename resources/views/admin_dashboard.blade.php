@extends('layouts.app')

@section('page-title', 'Admin Dashboard')


@section('content')
    <div class="container">
        <h2>Welkom, {{ Auth::user()->first_name }}!</h2>

        <div>
            <h3>Dit zijn je reserveringen van vandaag en morgen: </h3>
            <!-- Voeg hier de code toe om de reserveringen van vandaag en morgen weer te geven -->
            <!-- Bijvoorbeeld: -->
{{--            @foreach ($reservations as $reservation)--}}
{{--                <p>{{ $reservation->date }} - {{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</p>--}}
{{--            @endforeach--}}
        </div>

        <a href="{{ route('reservations.index') }}" class="btn btn-primary">Bekijk alle reserveringen</a>
    </div>
@endsection


