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
        @error('dienst')
        {{$message}}
        @enderror
    </div>
    <!-- Datum -->
    <div class="form-group">
        <label for="date">Datum:</label>
        <select name="date" id="date" class="form-control">
            @foreach($availableDates as $availableDate)
                <option value="{{ $availableDate->id }}">{{ $availableDate->date }}</option>
            @endforeach
        </select>
        @error('datum')
        {{$message}}
        @enderror
    </div>

    <!-- Naam -->
    <div class="form-group">
        <label for="naam">Naam:</label>
        <input type="text" name="naam" id="naam" class="form-control" value="{{ auth()->check() ? auth()->user()->name : '' }}">
        @error('naam')
        {{$message}}
        @enderror
    </div>

    <!-- Achternaam -->
    <div class="form-group">
        <label for="achternaam">Achternaam:</label>
        <input type="text" name="achternaam" id="achternaam" class="form-control" value="{{ auth()->check() ? auth()->user()->last_name : '' }}">
        @error('achternaam')
        {{$message}}
        @enderror
    </div>

    <!-- E-mailadres -->
    <div class="form-group">
        <label for="email">E-mailadres:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ auth()->check() ? auth()->user()->email : '' }}">
        @error('email')
        {{$message}}
        @enderror
    </div>

    <!-- Telefoonnummer -->
    <div class="form-group">
        <label for="telefoonnummer">Telefoonnummer:</label>
        <input type="tel" name="telefoonnummer" id="telefoonnummer" class="form-control" value="{{ auth()->check() ? auth()->user()->phone_number : '' }}">
        @error('telefoonnummer')
        {{$message}}
        @enderror
    </div>

    <!-- Postcode -->
    <div class="form-group">
        <label for="postcode">Postcode:</label>
        <input type="text" name="postcode" id="postcode" class="form-control" value="{{ auth()->check() ? auth()->user()->zip_code : '' }}">
        @error('postcode')
        {{$message}}
        @enderror
    </div>

    <!-- Huisnummer + Toevoeging -->
    <div class="form-group">
        <label for="huisnummer">Huisnummer + Toevoeging:</label>
        <input type="text" name="huisnummer" id="huisnummer" class="form-control" value="{{ auth()->check() ? auth()->user()->house_number : '' }}">
        @error('huisnummer')
        {{$message}}
        @enderror
    </div>

    <!-- Geboortedatum -->
    <div class="form-group">
        <label for="geboortedatum">Geboortedatum:</label>
        <input type="date" name="geboortedatum" id="geboortedatum" class="form-control" value="{{ auth()->check() ? auth()->user()->birthdate : '' }}">
        @error('geboortedatum')
        {{$message}}
        @enderror
    </div>

    <!-- Opmerkingen -->
    <div class="form-group">
        <label for="opmerkingen">Opmerkingen:</label>
        <textarea name="opmerkingen" id="opmerkingen" class="form-control" rows="4"></textarea>
        @error('opmerkingen')
        {{$message}}
        @enderror
    </div>

    <!-- Submit knop -->
    <button type="submit" class="btn btn-primary">Reserveren</button>
</form>




