@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reservering Bewerken</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="treatment_id" class="form-label">Behandeling</label>
                <select class="form-control" name="treatment_id" id="treatment_id" required>
                    @foreach($treatments as $treatment)
                        <option value="{{ $treatment->id }}" {{ $reservation->treatment_id == $treatment->id ? 'selected' : '' }}>
                            {{ $treatment->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="reservation_date" class="form-label">Datum</label>
                <select class="form-control" name="reservation_date" id="reservation_date" required>
                    @foreach($availableDates as $date)
                        <option value="{{ $date->id }}" {{ $reservation->reservation_date == $date->date ? 'selected' : '' }}>
                            {{ $date->date }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="reservation_time" class="form-label">Tijd</label>
                <select class="form-control" name="reservation_time" id="reservation_time" required>
                    @foreach($availableDates->find($reservation->reservation_date)->times ?? [] as $time)
                        <option value="{{ $time->id }}" {{ $reservation->reservation_time == $time->time ? 'selected' : '' }}>
                            {{ $time->time }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Voornaam</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $reservation->name }}" required>
            </div>

            <!-- Voeg overige velden toe zoals email, phone_number, etc. -->

            <button type="submit" class="btn btn-success">Opslaan</button>
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Annuleren</a>
        </form>
    </div>

@endsection

