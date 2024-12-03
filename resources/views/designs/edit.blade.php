@extends('layouts.app') {{-- Pas dit aan naar jouw basis layout --}}

@section('content')
    <div class="container">
        <h1>Ontwerp Bewerken</h1>
        <form action="{{ route('designs.update', $design->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Specificeer dat dit een PUT request is --}}

            {{-- Afbeelding Uploaden --}}
            <div class="form-group">
                <label for="image">Afbeelding</label>
                <input type="file" class="form-control" name="image" id="image">
                @if($design->image_path)
                    <div>
                        <img src="{{ asset($design->image_path) }}" alt="Design Afbeelding" style="max-width: 200px;">
                    </div>
                @endif
            </div>

            {{-- Overige velden hier toevoegen... --}}

            <button type="submit" class="btn btn-primary">Bewerken</button>
        </form>
    </div>
@endsection
