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

        <label for="price">Prij
@endsection
