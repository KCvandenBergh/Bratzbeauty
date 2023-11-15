@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Welcome to your dashboard {{ Auth::user()->name }}. How are you today?</h1>
<a href="{{ route('reservations.index') }}">Reservations</a>
<a href="{{ route('designs.index') }}">Designs</a>
<a href="{{ route('colors.index') }}">Colors</a>
<a href="{{ route('treatments.index') }}">Treatments</a>

</body>

@endsection
