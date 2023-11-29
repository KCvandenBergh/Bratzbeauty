@extends('layouts.app')

@section('page-title', 'Diensten')

@section('content')
    <h1>Diensten</h1>

    <div>
        @foreach($treatments as $treatment)
            <div>
                <h2>{{ $treatment->name }}</h2>
                <p>{{ $treatment->description }}</p>
                <p>Prijs: {{ $treatment->price }}</p>
                <p>Duur: {{ $treatment->duration }} minuten</p>

                @auth
                    <!-- Link naar bewerken -->
                <a href="{{ route('treatments.edit', $treatment->id) }}">Bewerken</a>

                <!-- Formulier voor verwijderen -->
                <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Weet je zeker dat je deze behandeling wilt verwijderen?')">Verwijderen</button>
                </form>
                    @endauth
            </div>
        @endforeach

        @auth
            <div>
                <a href="{{ route('treatments.create') }}">Voeg nieuwe behandeling toe</a>
            </div>
    @endauth

    <!-- Andere dienstinformatie hier... -->
    </div>
@endsection

