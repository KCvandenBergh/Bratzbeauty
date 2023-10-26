<form action="{{ route('colors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" required>

    <label for="description">Beschrijving:</label>
    <textarea id="description" name="description" rows="4" required></textarea>

    <label for="image">Afbeelding (JPG, PNG):</label>
    <input type="file" id="image" name="image" accept="image/jpeg, image/png" required>

    <button type="submit">Opslaan</button>
</form>
