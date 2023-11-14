@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Website</title>
</head>
<body>
<h1>Welcome to your dashboard {{ Auth::user()->name }}. How are you today?</h1>
<h2>Reservations</h2>
<h2>Colors</h2>
<h2>Designs</h2>

</body>

@endsection
