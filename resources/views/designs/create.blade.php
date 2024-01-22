@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Voeg een nieuw design toe</h1>

        <form method="POST" action="{{ route('designs.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Add your form fields here, e.g., for image upload -->
            <div class="form-group">
                <label for="image">Design Foto:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <!-- Other form fields can be added as needed -->

            <button type="submit" class="btn btn-primary">Bevestig</button>
        </form>
    </div>
@endsection
