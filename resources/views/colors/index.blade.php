@extends('layouts.app')

@section('page-title', 'Kleurtjes Overzicht')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Kleurtjes Overzicht</h2>

    <table>
        <!-- Tabelkop -->
        <thead>
        <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Foto</th>
        </tr>
        </thead>
        <!-- Tabelinhoud -->
        <tbody>
        @foreach ($colors as $color)
            <tr>
                <td>{{ $color->name }}</td>
                <td>{{ $color->description }}</td>
                <td>
                    @if ($color->image_url)
                        <img src="{{ asset('storage/' . $color->image_url) }}" alt="{{ $color->name }}" width="100">
                    @else
                        Geen afbeelding beschikbaar
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @auth
    <a href="{{ route('colors.create') }}">Nieuw kleurtje toevoegen</a>
    @endauth

@endsection


