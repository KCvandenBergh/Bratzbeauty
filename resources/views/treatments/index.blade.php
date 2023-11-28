@extends('layouts.app')

@section('page-title', 'Diensten')

@section('content')
    <h1>Diensten</h1>

    <div>
        <div>
            <h2>Russian Manicure</h2>
        </div>

        @auth
                <div>
                    <a href="{{ route('treatments.create') }}">Voeg nieuwe treatment toe</a>
                </div>
    @endauth

    <!-- Andere dienstinformatie hier... -->

    </div>
@endsection
