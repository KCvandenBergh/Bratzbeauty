<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle behandelingen op uit de database
        $treatments = Treatment::all();

        // Geef de behandelingen door aan de view
        return view('treatments.index', compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('treatments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        // Maak een nieuwe Treatment aan en vul deze met de gegeven data
        $treatment = new Treatment([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'duration' => $request->input('duration'),
        ]);

        // Sla de behandeling op in de database
        $treatment->save();

        // Terugkeren naar de indexpagina voor behandelingen
        return redirect()->route('treatments.index')->with('success', 'Behandeling is succesvol toegevoegd.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        // Zoek de behandeling op basis van het ID
        $treatment = Treatment::findOrFail($id);

        // Werk de behandeling bij met de gegeven data
        $treatment->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'duration' => $request->input('duration'),
        ]);

        // Terugkeren naar de indexpagina voor behandelingen
        return redirect()->route('treatments.index')->with('success', 'Behandeling is succesvol bijgewerkt.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Zoek de behandeling op basis van het ID
        $treatment = Treatment::findOrFail($id);

        // Verwijder de behandeling
        $treatment->delete();

        // Terugkeren naar de indexpagina voor behandelingen
        return redirect()->route('treatments.index')->with('success', 'Behandeling is succesvol verwijderd.');
    }
}
