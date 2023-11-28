@extends('layouts.app')

@section('page-title', 'Create Review')

@section('content')
    <h1>Voeg een nieuwe review toe</h1>

    <form method="POST" action="{{ route('reviews.store') }}">
    @csrf

    <!-- Naam -->
        <div class="form-group">
            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Inhoud -->
        <div class="form-group">
            <label for="content">Inhoud:</label>
            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
        </div>

        <!-- Score -->
        <div class="form-group">
            <label for="score">Score (0-5):</label>
            <input type="number" name="score" id="score" class="form-control" min="0" max="5" required>
        </div>

        <!-- Submit knop -->
        <button type="submit" class="btn btn-primary">Maak review</button>
    </form>
@endsection


