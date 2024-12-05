@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Design gallery</h1>

        <form action="{{ route('designs.multipleDelete') }}" method="POST" id="deleteForm">
            @method('DELETE')
            @csrf

            <div class="row">
                @foreach($designs as $design)
                    <div class="col-md-3 mb-3">
                        <label>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <input type="checkbox" name="designsToDelete[]" value="{{ $design->id }}">
                                @endif
                            @endauth

                            <img src="{{ asset('storage/' . $design->image_path) }}" alt="{{ $design->id }}" class="img-thumbnail">

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <div class="form-check form-switch mt-2">
                                        <input type="checkbox"
                                               class="form-check-input toggle-status"
                                               data-id="{{ $design->id }}"
                                            {{ $design->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $design->is_active ? 'Actief' : 'Inactief' }}
                                        </label>
                                    </div>
                                @endif
                            @endauth
                        </label>
                    </div>
                @endforeach
            </div>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('designs.create') }}" class="btn btn-primary mb-3">Voeg design toe</a>
                    <button type="submit" class="btn btn-danger" id="deleteButton">Verwijder geselecteerde designs</button>
                @endif
            @endauth
        </form>
    </div>
@endsection



