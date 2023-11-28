<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'score' => 'required|integer|min:0|max:5', // Aangepast naar max:5 voor 0 tot 5 sterren
        ]);

        // Maak een nieuwe Review aan en vul deze met de gegeven data
        $review = new Review([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'score' => $request->input('score'),
        ]);

        // Sla de review op in de database
        $review->save();

        // Terugkeren naar de indexpagina voor reviews met een succesmelding
        return redirect()->route('reviews.index')->with('success', 'Review is succesvol toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
