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
                @if(auth()->user()->role === 'admin')
                    <!-- Link naar bewerken -->
                        <form action="{{ route('treatments.edit', $treatment->id) }}" method="GET">
                            <button type="submit" >
                                Bewerken
                            </button>
                        </form>
                        <!-- Formulier voor verwijderen -->
                        <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Weet je zeker dat je deze behandeling wilt verwijderen?')">Verwijderen</button>
                        </form>
                    @endif
                @endauth
        @endforeach

            @auth
                @if(auth()->user()->role === 'admin')
                    <div>
                        <a href="{{ route('treatments.create') }}">Voeg nieuwe behandeling toe</a>
                    </div>
            @endif
        @endauth


        <!-- Andere dienstinformatie hier... -->
    </div>
@endsection

