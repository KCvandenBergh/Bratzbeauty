@extends('layouts.app')

@section('page-title', 'Bewerk Behandeling')

@section('content')
    <h1>Bewerk Behandeling</h1>

    <form action="{{ route('treatments.update', $treatment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Naam:</label>
        <input type="text" name="name" value="{{ old('name', $treatment->name) }}" required>

        <label for="description">Beschrijving:</label>
        <textarea name="description" required>{{ old('description', $treatment->description) }}</textarea>

        <label for="price">Prijs:</label>
        <input type="number" name="price" value="{{ old('price', $treatment->price) }}" required>

        <label for="duration">Duur (minuten):</label>
        <input type="number" name="duration" value="{{ old('duration', $treatment->duration) }}" required>

        <!-- Voeg hier andere velden toe die je wilt bewerken -->

        <button type="submit">Bijwerken</button>
    </form>
@endsection
