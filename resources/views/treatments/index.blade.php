@extends('layouts.app')

@section('page-title', 'Diensten')

@section('content')

    <h1>
        Diensten
    </h1>
    <body>
    <div>
        <div>
       russian manicure
        </div>

        <div>
            <button onclick="window.location='{{ route("reservations.create") }}'">
                Maak Afspraak
            </button>
        </div>

    </div>
    </body>
