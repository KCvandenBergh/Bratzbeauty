
    <div class="container">
        <h1>Bewerk Kleurtje</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('colors.update', ['color' => $color->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Methode voor het bijwerken aangeven -->

            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $color->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Beschrijving:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $color->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Afbeelding (JPG, PNG):</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/jpeg, image/png">
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>



