

<body>
<form method="POST" action="{{ route('kleuren.opslaan') }}" enctype="multipart/form-data">
@csrf

<!-- Biabkleur -->
    <div class="form-group">
        <label for="biabkleur">Biabkleur:</label>
        <input type="text" name="biabkleur" id="biabkleur" class="form-control">
    </div>

    <!-- Foto 1 -->
    <div class="form-group">
        <label for="foto1">Foto 1:</label>
        <input type="file" name="foto1" id="foto1" accept="image/*">
    </div>

    <!-- Foto 2 -->
    <div class="form-group">
        <label for="foto2">Foto 2:</label>
        <input type="file" name="foto2" id="foto2" accept="image/*">
    </div>

    <!-- Foto 3 -->
    <div class="form-group">
        <label for="foto3">Foto 3:</label>
        <input type="file" name="foto3" id="foto3" accept="image/*">
    </div>

    <!-- Omschrijving -->
    <div class="form-group">
        <label for="omschrijving">Omschrijving:</label>
        <textarea name="omschrijving" id="omschrijving" class="form-control" rows="4"></textarea>
    </div>

    <!-- Submit knop -->
    <button type="submit" class="btn btn-primary">Opslaan</button>
</form>
</body>
