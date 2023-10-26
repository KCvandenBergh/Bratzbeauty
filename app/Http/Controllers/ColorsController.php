<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Storage;


class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle kleuren op uit de database
        $colors = Color::all();

        // Geef de kleurenvariabele door aan de weergave
        return view('colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        // Afbeelding uploaden en opslaan
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/nail_colors');
        } else {
            // Handel het geval af waarin geen afbeelding is geüpload
        }

        // Nieuw Color-object maken en opslaan
        $nailColor = new Color([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image_url' => $imagePath, // Pad naar opgeslagen afbeelding
        ]);

        Storage::put('file.jpg', $resources);

        $nailColor->save();

        // Terugkeren naar de index
        return redirect()->route('colors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Zoek het kleurtje op basis van het ID
        $color = Color::find($id);

        if ($color) {
            // Als het kleurtje bestaat, geef de bewerkingsweergave weer met de gegevens
            return view('colors.edit', ['color' => $color]);
        } else {
            // Als het kleurtje niet bestaat, toon een foutmelding of redirect naar de indexpagina
            return redirect()->route('colors.index')->with('error', 'Kleurtje niet gevonden');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
