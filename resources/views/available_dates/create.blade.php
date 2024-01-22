@extends('layouts.app')

@section('content')
    <h1>Voeg Beschikbare Datum Toe</h1>

    <form action="{{ route('available-dates.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="date">Datum:</label>
            <input type="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="time">Tijd:</label>
            <input type="time" name="time" required>
        </div>

        <button type="submit">Opslaan</button>
    </form>
@endsection

