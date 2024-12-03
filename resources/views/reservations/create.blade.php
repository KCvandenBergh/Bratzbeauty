@extends('layouts.app')

@section('page-title', 'Maak Reservering')

@section('content')
    <div class="container">
        <h2>Nieuwe Reservering Maken</h2>
        <form method="POST" action="{{ route('reservations.store') }}">
        @csrf

        <!-- Dienst -->
            <div class="form-group">
                <label for="treatment_id">Dienst:</label>
                <select name="treatment_id" id="treatment_id" class="form-control">
                    @foreach($treatments as $treatment)
                        <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                    @endforeach
                </select>
                @error('treatment_id')
                {{$message}}
                @enderror
            </div>

            <!-- Datum -->
            <div class="form-group">
                <label for="reservation_date">Datum:</label>
                <select name="reservation_date" id="reservation_date" class="form-control" onchange="fetchTimes(this.value)">
                    @foreach($availableDates as $availableDate)
                        <option value="{{ $availableDate->id }}">{{ $availableDate->date }}</option>
                    @endforeach
                </select>
                @error('reservation_date')
                {{$message}}
                @enderror
            </div>

            <!-- Tijd -->
            <div class="form-group">
                <label for="reservation_time">Tijd:</label>
                <select name="reservation_time" id="reservation_time" class="form-control">
                    @foreach ($availableTimes as $availableTime)
                        <option value="{{ $availableTime->id }}">{{ $availableTime->time }}</option>
                    @endforeach
                </select>
                @error('reservation_time')
                {{$message}}
                @enderror
            </div>

            <!-- Naam -->
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->check() ? auth()->user()->name : '' }}">
                @error('name')
                {{$message}}
                @enderror
            </div>

            <!-- Achternaam -->
            <div class="form-group">
                <label for="last_name">Achternaam:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ auth()->check() ? auth()->user()->last_name : '' }}">
                @error('last_name')
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
                <label for="phone_number">Telefoonnummer:</label>
                <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{ auth()->check() ? auth()->user()->phone_number : '' }}">
                @error('phone_number')
                {{$message}}
                @enderror
            </div>

            <!-- Postcode -->
            <div class="form-group">
                <label for="zip_code">Postcode:</label>
                <input type="text" name="zip_code" id="zip_code" class="form-control" value="{{ auth()->check() ? auth()->user()->zip_code : '' }}">
                @error('zip_code')
                {{$message}}
                @enderror
            </div>

            <!-- Huisnummer -->
            <div class="form-group">
                <label for="house_number">Huisnummer:</label>
                <input type="text" name="house_number" id="house_number" class="form-control" value="{{ auth()->check() ? auth()->user()->house_number : '' }}">
                @error('house_number')
                {{$message}}
                @enderror
            </div>

            <!-- Geboortedatum -->
            <div class="form-group">
                <label for="birthdate">Geboortedatum:</label>
                <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ auth()->check() ? auth()->user()->birthdate : '' }}">
                @error('birthdate')
                {{$message}}
                @enderror
            </div>

            <!-- Opmerkingen -->
            <div class="form-group">
                <label for="comments">Opmerkingen:</label>
                <textarea name="comments" id="comments" class="form-control" rows="4"></textarea>
                @error('comments')
                {{$message}}
                @enderror
            </div>

            <!-- Submit knop -->
            <button type="submit" class="btn btn-primary">Reserveren</button>
        </form>

        <script>
            function fetchTimes(dateId) {
                if (dateId) {
                    fetch(`/available-times/${dateId}`)
                        .then(response => response.json())
                        .then(times => {
                            let timeSelect = document.getElementById('reservation_time');
                            timeSelect.innerHTML = ''; // Clear previous options
                            times.forEach(time => {
                                let option = document.createElement('option');
                                option.value = time.id;
                                option.text = time.time;
                                timeSelect.add(option);
                            });
                        })
                        .catch(error => console.error('Error fetching times:', error));
                }
            }
        </script>
    </div>
@endsection
