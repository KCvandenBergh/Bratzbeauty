@extends('layouts.app')

@section('page-title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h2>Welkom, {{ Auth::user()->first_name }}!</h2>

        <div>
            <h3>Dit zijn je reserveringen van vandaag en morgen:</h3>
            <!-- Voeg hier de code toe om de reserveringen van vandaag en morgen weer te geven -->
        </div>

        <div>
            <h3>Jouw beschikbare data en tijden:</h3>
            <ul>
                @foreach ($dates as $availableDate)
                    <li>
                        {{ $availableDate->date }} - Tijden:
                        <ul>
                            @foreach ($availableDate->times as $time)
                                <li>{{ $time->time }}
                                    <form action="{{ route('available-times.destroy', $time->id) }}" method="POST" style="display: inline;">
                                        @csrf

                                    </form>
                                </li>
                            @endforeach
                        </ul>
                        <form action="{{ route('available-dates.destroy', $availableDate->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('available-dates.create') }}" class="btn btn-success">Nieuwe beschikbare datum toevoegen</a>
        </div>

        <a href="{{ route('reservations.index') }}" class="btn btn-primary">Bekijk alle reserveringen</a>
    </div>
@endsection
