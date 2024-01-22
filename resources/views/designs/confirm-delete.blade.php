<?php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bevestig Verwijdering</h1>

        <p>Weet je zeker dat je deze foto wilt verwijderen?</p>
        <img src="{{ asset($design->image_path) }}" alt="Design Image" class="img-thumbnail">

        <form action="{{ route('designs.destroy', $design->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Ja, verwijder</button>
            <a href="{{ route('designs.index') }}" class="btn btn-secondary">Nee, annuleer</a>
        </form>
    </div>
@endsection
