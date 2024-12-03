@extends('layouts.app') <!-- Zorg ervoor dat je een layout hebt die basis-HTML bevat -->

@section('content')
    <div class="container">
        <h1>Reserveringen</h1>

        <!-- Zoek- en filterformulier -->
        <form method="GET" action="{{ route('reservations.index') }}" class="mb-3">
            <div class="row">
                <!-- Zoekveld voor naam -->
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Zoek op naam" value="{{ request()->get('search') }}">
                </div>

                <!-- Filter op datum -->
                <div class="col-md-3">
                    <select name="date" class="form-control">
                        <option value="">Selecteer datum</option>
                        @foreach($availableDates as $date)
                            <option value="{{ $date->id }}" {{ request()->get('date') == $date->id ? 'selected' : '' }}>
                                {{ $date->date }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter op behandeling -->
                <div class="col-md-3">
                    <select name="treatment" class="form-control">
                        <option value="">Selecteer behandeling</option>
                        @foreach($treatments as $treatment)
                            <option value="{{ $treatment->id }}" {{ request()->get('treatment') == $treatment->id ? 'selected' : '' }}>
                                {{ $treatment->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Zoek- en filterknop -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Zoeken</button>
                </div>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($reservations->isEmpty())
            <p>Er zijn momenteel geen reserveringen.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Behandeling</th>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Postcode</th>
                    <th>Huisnummer</th>
                    <th>Geboortedatum</th>
                    <th>Comments</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->treatment->name ?? 'N/A' }}</td>
                        <td>{{ $reservation->reservation_date }}</td>
                        <td>{{ $reservation->reservation_time }}</td>
                        <td>{{ $reservation->name }} {{ $reservation->last_name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->phone_number }}</td>
                        <td>{{$reservation->zip_code}}</td>
                        <td>{{$reservation->house_number}}</td>
                        <td>{{$reservation->birthdate}}</td>
                        <td>{{$reservation->comments}}</td>
                        <td>
                            <!-- Voeg hier links toe voor bewerken en verwijderen -->
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Bewerken</a>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je deze reservering wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

