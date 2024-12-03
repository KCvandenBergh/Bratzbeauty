@extends('layouts.app')

@section('page-title', 'Create Treatment')

@section('content')

    <a href="{{ route('treatments.index') }}" class="btn btn-secondary">Terug naar behandelingen</a>
    <h1>Voeg een nieuwe behandeling toe</h1>

    <form method="POST" action="{{ route('treatments.store') }}">
    @csrf

    <!-- Naam -->
        <div class="form-group">
            <label for="name">Naam van behandeling:</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
            <span>{{$message}}</span>
            @enderror
        </div>

        <!-- Beschrijving -->
        <div class="form-group">
            <label for="description">Beschrijving:</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
            @error('description')
            <span>{{$message}}</span>
            @enderror
        </div>

        <!-- Prijs -->
        <div class="form-group">
            <label for="price">Prijs:</label>
            <input type="number" name="price" id="price" class="form-control">
            @error('price')
            <span>{{$message}}</span>
            @enderror
        </div>

        <!-- Duur -->
        <div class="form-group">
            <label for="duration">Duur:</label>
            <input type="text" name="duration" id="duration" class="form-control">
            @error('duration')
            <span>{{$message}}</span>
            @enderror
        </div>

        <!-- Submit knop -->
        <button type="submit" class="btn btn-primary">Maak behandeling</button>
    </form>
@endsection
