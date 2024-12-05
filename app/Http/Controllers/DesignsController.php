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
        // Admins zien alle designs
        if (auth()->check() && auth()->user()->role === 'admin') {
            $designs = Design::all();
        } else {
            // Normale gebruikers zien alleen designs met is_active = true
            $designs = Design::where('is_active', true)->get();
        }

        return view('designs.index', compact('designs'));
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
    // Valideer het ingediende formulier
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Sla de afbeelding op
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->storePublicly('design', 'public');

        // Sla het ontwerp op in de database
        $design = Design::create([
            'image_path' => $imageName,
        ]);

        return redirect()->route('designs.index')
            ->with('success', 'Design is succesvol opgeslagen.');
    }

    return back()
        ->withInput()
        ->with('error', 'Er is iets fout gegaan bij het opslaan van het design.');
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
    public function edit($id)
    {
        $design = Design::findOrFail($id); // Zoek het ontwerp of geef een 404 terug als het niet gevonden wordt

        return view('designs.edit', compact('design')); // Stuur het ontwerp naar de bewerkingsview
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $design = Design::findOrFail($id);

        // Controleer of er een nieuwe afbeelding is geüpload
        if ($request->hasFile('image')) {
            // Verwijder de oude afbeelding
            File::delete(public_path($design->image_path));

            // Sla de nieuwe afbeelding op
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('public/images/designs'), $imageName);
            $design->image_path = 'public/images/designs/' . $imageName; // Corrigeer het pad indien nodig
        }

        // Sla op
        $design->save();

        return redirect()->route('designs.index')->with('success', 'Design is succesvol bijgewerkt.');
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

        // Verwijder de afbeelding van de server
        File::delete(public_path($design->image_path));

        // Verwijder het design uit de database
        $design->delete();

        return redirect()->route('designs.index')
            ->with('success', 'Design is succesvol verwijderd.');
    }
    public function destroyMultiple(Request $request)
    {
        // Valideer de request, bijvoorbeeld, zorg ervoor dat er ten minste één design ID is opgegeven
        $request->validate([
            'designsToDelete' => 'required|array',
            'designsToDelete.*' => 'exists:designs,id',
        ]);

        // Verwijder de geselecteerde designs
        $designsToDelete = $request->input('designsToDelete');
        foreach ($designsToDelete as $designId) {
            $design = Design::findOrFail($designId);
            File::delete(public_path($design->image_path)); // Verwijder de afbeelding van de server
            $design->delete(); // Verwijder het design uit de database
        }

        // Omleiden naar de designs.index met een succesbericht
        return redirect()->route('designs.index')->with('success', 'Geselecteerde designs zijn succesvol verwijderd.');
    }

    public function toggleStatus(Request $request, $id)
    {
        $design = Design::findOrFail($id);
        $design->is_active = $request->has('is_active'); // True als het vakje is aangevinkt, anders false
        $design->save();

        return redirect()->route('designs.index')->with('success', 'Designstatus bijgewerkt.');
    }


}
