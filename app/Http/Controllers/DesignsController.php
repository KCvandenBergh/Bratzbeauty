<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Design;
use Illuminate\Support\Facades\File;


class DesignsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designs = Design::all(); // Haal alle designs op uit de database

        return view('designs.index', ['designs' => $designs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('designs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Verwerk de geüploade afbeelding
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/designs'), $imageName);

        // Sla het design op in de database
        $design = Design::create([
            'image_path' => 'images/designs/' . $imageName,
        ]);

        return redirect()->route('designs.index')
            ->with('succes', 'Design is succesvol geupload.');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Show the confirmation page for deleting the design.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete($id)
    {
        $design = Design::findOrFail($id);
        return view('designs.confirm-delete', compact('design'));
    }

    /**
     * Remove the specified design from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $design = Design::findOrFail($id);

        // Hier kun je eventueel extra logica toevoegen, bijvoorbeeld het verwijderen van gerelateerde gegevens

        // Verwijder de afbeelding van de server
        File::delete(public_path($design->image_path));

        // Verwijder het design uit de database
        $design->delete();

        return redirect()->route('designs.index')
            ->with('success', 'Design is succesvol verwijderd.');
    }

    public function destroyMultiple(Request $request){
        dd('dsf');
    }
}
