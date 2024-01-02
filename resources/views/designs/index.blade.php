<!-- designs/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bekijk hier de designs</h1>

        <div class="row">
            @foreach($designs as $design)
                <div class="col-md-4">
                    <img src="{{ asset($design->image_path) }}" alt="Design">
                    <!-- Voeg andere velden toe -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
