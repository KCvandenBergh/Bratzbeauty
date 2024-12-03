@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">Terug naar Dashboard</a>
        <h2>Nieuwe Beschikbare Datum en Tijd Toevoegen</h2>
        <form action="{{ route('available-dates.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Datum</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <!-- Dynamisch toevoegen van tijden -->
            <div id="time-entries">
                <div class="mb-3">
                    <label for="time1" class="form-label">Tijd</label>
                    <input type="time" class="form-control" id="time1" name="times[]" required>
                </div>
            </div>

            <button type="button" id="add-time" class="btn btn-info">Tijd toevoegen</button>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>

    <script>
        document.getElementById('add-time').addEventListener('click', function() {
            const newTimeEntry = document.createElement('div');
            newTimeEntry.classList.add('mb-3');
            newTimeEntry.innerHTML = `
        <label for="time" class="form-label">Tijd</label>
        <input type="time" class="form-control" name="times[]" required>
    `;
            document.getElementById('time-entries').appendChild(newTimeEntry);
        });
    </script>
@endsection
