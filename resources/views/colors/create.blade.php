@extends('layouts.app')

@section('content')
<form action="{{ route('colors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" required>
    @error('name') {{$message}} @enderror

    <label for="description">Beschrijving:</label>
    <textarea id="description" name="description" rows="4" required></textarea>
    @error('description') {{$message}} @enderror

    <label for="image">Afbeelding (JPG, PNG):</label>
    <input type="file" id="image" name="image" accept="image/jpeg, image/png" required>
    @error('image') {{$message}} @enderror

    <button type="submit">Opslaan</button>
</form>
@endsection
