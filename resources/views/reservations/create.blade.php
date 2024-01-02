@extends('layouts.app')

@section('page-title', 'Make Reservation')

<form method="POST" action="{{ route('reservations.store') }}">
@csrf

<!-- Dienst -->
    <div class="form-group">
        <label for="dienst">Dienst:</label>
        <select name="dienst" id="dienst" class="form-control">
            @foreach($treatments as $treatment)
                <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
            @endforeach
        </select>
    </div>
    <!-- Datum -->
    <div class="form-group">
        <label for="datum">Datum:</label>
        <input type="date" name="datum" id="datum" class="form-control">
    </div>

    <!-- Naam -->
    <div class="form-group">
        <label for="naam">Naam:</label>
        <input type="text" name="naam" id="naam" class="form-control">
    </div>

    <!-- Achternaam -->
    <div class="form-group">
        <label for="achternaam">Achternaam:</label>
        <input type="text" name="achternaam" id="achternaam" class="form-control">
    </div>

    <!-- E-mailadres -->
    <div class="form-group">
        <label for="email">E-mailadres:</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <!-- Telefoonnummer -->
    <div class="form-group">
        <label for="telefoonnummer">Telefoonnummer:</label>
        <input type="tel" name="telefoonnummer" id="telefoonnummer" class="form-control">
    </div>

    <!-- Postcode -->
    <div class="form-group">
        <label for="postcode">Postcode:</label>
        <input type="text" name="postcode" id="postcode" class="form-control">
    </div>

    <!-- Huisnummer + Toevoeging -->
    <div class="form-group">
        <label for="huisnummer">Huisnummer + Toevoeging:</label>
        <input type="text" name="huisnummer" id="huisnummer" class="form-control">
    </div>

    <!-- Geboortedatum -->
    <div class="form-group">
        <label for="geboortedatum">Geboortedatum:</label>
        <input type="date" name="geboortedatum" id="geboortedatum" class="form-control">
    </div>

    <!-- Opmerkingen -->
    <div class="form-group">
        <label for="opmerkingen">Opmerkingen:</label>
        <textarea name="opmerkingen" id="opmerkingen" class="form-control" rows="4"></textarea>
    </div>

    <!-- Submit knop -->
    <button type="submit" class="btn btn-primary">Reserveren</button>
</form>




