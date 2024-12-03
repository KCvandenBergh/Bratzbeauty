@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">Terug naar Dashboard</a>
        <h1>Voeg een nieuw design toe</h1>

        <form method="POST" action="{{ route('designs.store') }}" enctype="multipart/form-data">
        @csrf


            <div class="form-group">
                <label for="image">Design Foto:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>



            <button type="submit" class="btn btn-primary">Bevestig</button>
        </form>
    </div>
@endsection
